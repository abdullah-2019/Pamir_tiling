<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;  

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
        $request->validate([
            'client_name' => 'required|string|max:255',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
        ]);

        /* 1.  NEW UPLOADS ------------------------------------------------------- */
        $paths = $project->images ?? [];                       // existing
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $paths[] = 'storage/' . $file->store('projects', 'public');
            }
        }

        /* 2.  ORDER & DELETE ---------------------------------------------------- */
        $wanted = $request->input('image_order', []);          // what the form sent
        $final  = [];

        foreach ($wanted as $p) {
            // keep only if the file actually exists
            if (in_array($p, $paths)) {
                $final[] = $p;
            }
        }

        /* 3.  SAVE -------------------------------------------------------------- */
        $project->update([
            'client_name' => $request->client_name,
            'images'      => $final,
        ]);

        return redirect()->route('projects.show', $project)
                        ->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $project)
    {
        //
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
