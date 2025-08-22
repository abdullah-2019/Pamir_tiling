<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use Illuminate\Http\Request;

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
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicesRequest $request, Services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        //
    }

    public function page() {
        $services = Services::all();
        return view('site.services.index', compact('services'));
    }

    public function serviceDetail($slug) {
        $service = Services::where('slug', $slug)->firstOrFail();
        return view('site.services.detail', compact('service'));
    }

}
