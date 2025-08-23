<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ServicesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-pages.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:255', 'unique:'.Services::class],
            'slug'  => ['required','string','max:255','lowercase', 'unique:'.Services::class],
            'desc'  => ['required','string'],
            'features' => ['required','array'],
            'features.*' => ['nullable','string','max:255'],
            'image' => ['required','image','mimes:png,jpg,jpeg,svg','max:2048'],
        ]);

        // Store image
        $path = $request->file('image')->store('services', 'public'); // storage/app/public/services/...

        $service = Services::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'], 
            'desc' => $validated['desc'],
            'features' => array_values(array_filter($validated['features'] ?? [])),
            'image' => $path,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $service)
    {
        return view('admin-pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $service)
    {
        return view('admin-pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $service)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:255', 'unique:services,title,'.$service->id],
            'slug'  => ['required','string','max:255','lowercase', 'unique:services,slug,'.$service->id],
            'desc'  => ['required','string'],
            'features' => ['required','array'],
            'features.*' => ['nullable','string','max:255'],
            'image' => ['nullable','image','mimes:png,jpg,jpeg,svg','max:2048'],
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'desc' => $validated['desc'],
            'features' => array_values(array_filter($validated['features'] ?? [])),
        ];

        if ($request->hasFile('image')) {
            // Remove old image
            if ($service->image && \Storage::disk('public')->exists($service->image)) {
                \Storage::disk('public')->delete($service->image);
            }
            // Store new image
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
        if ($service->image && \Storage::disk('public')->exists($service->image)) {
            if (\Storage::disk('public')->delete($service->image)) {
                $service->delete();
                return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
            } else {
                return redirect()->route('services.index')->with('error', 'Error deleting service image.');
            }
        } else {
            $service->delete();
            return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
        }
    }

    public function page() {
        $services = Services::all();
        return view('site.services.index', compact('services'));
    }

    public function serviceDetail($slug) {
        $service = Services::where('slug', $slug)->firstOrFail();
        return view('site.services.detail', compact('service'));
    }

    public function data(Request $request)
    {
        $query = Services::query()->select(['id', 'title'])->orderBy('title', 'asc');

        return DataTables::of($query)
             ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $view = route('services.show', $row->id);
                $edit = route('services.edit', $row->id);
                $delete = route('services.destroy', $row->id);
                return view('admin-pages.services.partials.actions', compact('view','edit','delete','row'))->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


}
