<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Yajra\DataTables\DataTables;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-pages.contact.index');
    }

    public function data(Request $request)
    {
        $query = Contact::query()->select(['id', 'name', 'email', 'phone', 'created_at']);

        return DataTables::of($query)
            // Optional: add an index column if you want row numbers
            // ->addIndexColumn()

            ->editColumn('created_at', function ($row) {
                return optional($row->created_at)->format('Y-m-d');
            })

            ->addColumn('actions', function ($row) {
                $view = route('contacts.show', $row->id);
                $edit = route('contacts.edit', $row->id);
                $delete = route('contacts.destroy', $row->id);

                // Return HTML for action buttons
                return view('admin-pages.contact.partials.actions', compact('view','edit','delete','row'))->render();
            })

            ->rawColumns(['actions']) // allow HTML in actions
            ->make(true);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function page() {
        return view('site.contact');
    }
}
