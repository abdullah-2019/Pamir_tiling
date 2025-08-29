<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['page', 'store']);
    }

    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        return view('admin-pages.contact.index');
    }

    public function data(Request $request)
    {
        $query = Contact::query()
            ->select([
                'id',
                DB::raw("CONCAT(name, ' ', last_name) AS full_name"),
                'email',
                'phone',
                'created_at',
                'status'
            ])
            ->get();
        // Apply status filter if provided: "" (all), "0" (unread), "1" (read)
        if ($request->filled('status') && $request->status !== '') {
            $query->where('status', (int) $request->status);
        }

        return DataTables::of($query)
            ->editColumn('created_at', function ($row) {
                return optional($row->created_at)->format('Y-m-d');
            })
            // Include status in the dataset so DataTables can use it for row styling
            ->addColumn('status', function ($row) {
                return (int) $row->status;
            })
            ->addColumn('actions', function ($row) {
                $view = route('contact.show', $row->id);
                $delete = route('contact.destroy', $row->id);
                $toggleStatus = route('contact.toggleStatus', $row->id);

                return view('admin-pages.contact.partials.actions', compact('view', 'delete', 'toggleStatus', 'row'))->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function toggleStatus(Request $request, Contact $contact)
    {
        $contact->status = $contact->status ? 0 : 1;
        $contact->save();

        return response()->json([
            'message' => 'Status updated.',
            'status' => (int) $contact->status,
        ]);
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
        // 1) validation is already handled by StoreContactRequest
        $data = $request->validated();

        // 2) wrap the insert in a try/catch
        try {
            Contact::create($data);
            return back()->with(['success' => 'Your message was sent successfully!']);
        } catch (\Throwable $e) {
            return back()
                ->withInput()        // keep the form filled
                ->with(['error' => 'Sorry, we could not save your message. Please try again later.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $contact->status = 1;
        $contact->save();
        return view('admin-pages.contact.show', compact('contact'));
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
        try {
            $contact->delete();
            return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('contact.index')
                ->with('error', 'Failed to delete contact: ' . $e->getMessage());
        }
    }

    public function page() {
        return view('site.contact');
    }
}
