<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;  
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-pages.projects.index');
    }

    public function data(Request $request)
    {
        $query = Projects::query()->select(['id', 'client_name', 'images']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('images', function ($row) {
                // Normalize images to an array
                $images = [];

                if (is_array($row->images)) {
                    $images = $row->images;
                } elseif (is_string($row->images) && $row->images !== '') {
                    // If stored as JSON
                    $decoded = json_decode($row->images, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $images = $decoded;
                    } else {
                        // Fallback: comma-separated string
                        $images = array_map('trim', explode(',', $row->images));
                    }
                }

                // Limit number shown (e.g., max 4 like your template)
                $images = array_slice($images, 0, 4);

                // Build HTML
                $html = '<ul class="list-inline mb-0">';
                foreach ($images as $path) {
                    // Resolve to full URL; adjust if you store absolute URLs
                    $src = filter_var($path, FILTER_VALIDATE_URL) ? $path : asset($path);
                    $html .= '<li class="list-inline-item">'
                        . '<img alt="Project Image" class="table-avatar" src="' . e($src) . '">'
                        . '</li>';
                }

                // Optional: placeholder if no images
                if (empty($images)) {
                    $html .= '<li class="list-inline-item text-muted small">No images</li>';
                }

                $html .= '</ul>';

                return $html;
            })
            ->addColumn('actions', function ($row) {
                $view = route('projects.show', $row->id);
                $edit = route('projects.edit', $row->id);
                $delete = route('projects.destroy', $row->id);
                return view('admin-pages.projects.partials.actions', compact('view','edit','delete','row'))->render();
            })
            ->rawColumns(['images', 'actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'client_name'   => ['required', 'string', 'max:255'],
            'images'        => ['nullable', 'array'],
            'images.*'      => ['image', 'mimes:jpeg,png,jpg,gif,webp,avif', 'max:5120'], // max 5MB each
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Optional: create a unique filename while preserving extension
                $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();

                // Store on the public disk under "projects" folder
                // This creates storage/app/public/projects/xxx.ext
                $path = $file->storeAs('projects', $filename, 'public');

                // Save the public path (e.g., "storage/projects/xxx.ext") for easy use in views
                $publicPath = 'storage/' . $path;

                $imagePaths[] = $publicPath;
            }
        }

        $project = Projects::create([
            'client_name' => $validated['client_name'],
            'images'      => $imagePaths, // will be stored as JSON because of cast
        ]);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $project)
    {
        return view('admin-pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $project)
    {
        return view('admin-pages.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projects $project)
    {
        $validated = $request->validate([
            'client_name'   => 'required|string|max:255',
            'images'        => 'nullable|array',
            'images.*'      => 'image|max:2048',
            'image_order'   => 'nullable|array',
            'image_order.*' => 'string',
        ]);

        // 0) Start with current images
        $current = $project->images ?? [];

        // 1) Handle new uploads
        $newUploads = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Optional: custom filename to avoid collisions
                $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
                $stored = $file->storeAs('projects', $filename, 'public'); // "projects/uuid.ext"
                $publicPath = 'storage/' . $stored;
                $newUploads[] = $publicPath;
                $current[] = $publicPath; // Keep current in sync for consistency
            }
        }

        // 2) Build final list
        $wanted = $validated['image_order'] ?? null;
        $final = [];

        if (is_array($wanted) && count($wanted)) {
            // Keep only items that exist in $current (existing or newly uploaded)
            foreach ($wanted as $path) {
                if (in_array($path, $current, true)) {
                    $final[] = $path;
                }
            }
            // If the UI didn't include new uploads in image_order, append them at the end
            // to ensure new files aren't lost.
            foreach ($newUploads as $path) {
                if (!in_array($path, $final, true)) {
                    $final[] = $path;
                }
            }
        } else {
            // No order provided: keep all current (existing + new) in their natural order
            $final = array_values(array_unique($current));
        }

        // 3) Delete removed files from disk
        $removed = array_diff($project->images ?? [], $final);
        foreach ($removed as $publicPath) {
            if (str_starts_with($publicPath, 'storage/')) {
                $diskPath = substr($publicPath, strlen('storage/')); 
                Storage::disk('public')->delete($diskPath);
            }
        }

        // 4) Save
        $project->update([
            'client_name' => $request->input('client_name'),
            'images'      => array_values($final),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Project Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $project)
    {
        $errors = [];

        $images = $project->images ?? []; 
        
        if (is_array($images) && count($images)) {
            foreach ($images as $publicPath) {
                $diskPath = str_starts_with($publicPath, 'storage/')
                    ? substr($publicPath, strlen('storage/')) 
                    : $publicPath;

                try {
                    if (Storage::disk('public')->exists($diskPath)) {
                        if (!Storage::disk('public')->delete($diskPath)) {
                            $errors[] = $publicPath;
                        }
                    }
                } catch (\Throwable $e) {
                    $errors[] = $publicPath . ' (' . $e->getMessage() . ')';
                }
            }
        }

        // Delete the project record regardless of image deletion success,
        // or choose to abort if you want strict behavior.
        $project->delete();

        if (!empty($errors)) {
            return redirect()->back()->with('warning', 'Project deleted, but some images could not be removed: ' . implode(', ', $errors));
        }

        return redirect()->back()->with('success', 'Project and images deleted successfully.');
    }

    public function page() {
        $projects = Projects::all();
        return view('site.projects.index', compact('projects'));
    }

    function projectDetial($id) {
        $project = Projects::findOrFail($id);
        $otherProjects = Projects::where('id', '<>', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('site.projects.detail', compact('project', 'otherProjects'));
    }
}
