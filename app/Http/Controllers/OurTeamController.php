<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Http\Requests\StoreOurTeamRequest;
use App\Http\Requests\UpdateOurTeamRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OurTeamController extends Controller
{

    function __constract() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-pages.our-team.index');
    }

    public function data(Request $request)
    {
        $query = OurTeam::all();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $edit = route('our-team.edit', $row->id);
                $delete = route('our-team.destroy', $row->id);
                return view('admin-pages.our-team.partials.actions', compact('edit','delete','row'))->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-pages.our-team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOurTeamRequest $request)
    {
        $validated = $request->validated();
        OurTeam::create($validated);
        return redirect()->back()->with('success', 'Data Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTeam $ourTeam)
    {
        return view('admin-pages.our-team.edit', compact('ourTeam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOurTeamRequest $request, OurTeam $ourTeam)
    {
        $validated = $request->validated();
        $ourTeam->update($validated);
        return redirect()->back()->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurTeam $ourTeam)
    {
        $ourTeam->delete();
        return redirect()->back()->with('success', 'Data Deleted.');
    }
}
