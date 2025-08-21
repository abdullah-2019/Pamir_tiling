<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\Projects;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::firstOrFail();
        return view('admin-pages.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }

    public function page() {
        $about = About::all();
        $projects = Projects::inRandomOrder()->take(2)->get();
        return view('site.about', compact('about', 'projects'));
    }

    // Update email
    public function updateEmail(Request $request, About $about)
    {
        $validated = $request->validate([
            'index' => 'required|integer|min:0',
            'email' => 'required|email',
        ]);

        $emails = is_array($about->emails) ? $about->emails : [];

        if (!array_key_exists($validated['index'], $emails)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email index.'
            ], 404);
        }

        $newEmail = $validated['email'];
        $index = (int) $validated['index'];
        $duplicateAt = array_search(strtolower($newEmail), array_map('strtolower', $emails));
        if ($duplicateAt !== false && $duplicateAt !== $index) {
            return response()->json([
                'success' => false,
                'message' => 'This email already exists.'
            ], 422);
        }

        $emails[$index] = $newEmail;
        $about->emails = array_values($emails);
        $about->save();
        cache()->flush();
        return response()->json([
            'success' => true,
            'index' => $index,
            'email' => $newEmail,
        ]);
    }

    // Add email to db.
    public function addEmail(Request $request, About $about) {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
    
        // Get current emails - Laravel's array cast will auto-decode JSON to array
        $emails = $about->emails ?? [];
        
        $newEmail = trim($validated['email']);
        
        // Check for duplicates (case-insensitive)
        foreach ($emails as $email) {
            if (strtolower(trim($email)) === strtolower($newEmail)) {
                return response()->json([
                    'success' => false,
                    'message' => 'This email already exists.'
                ], 422);
            }
        }
        
        // Add new email
        $emails[] = $newEmail;
        
        // Save back to database - Laravel will auto-encode to JSON
        $about->emails = array_values($emails);
        $about->save();

        cache()->flush();
        
        return response()->json([
            'success' => true,
            'email' => $newEmail,
            'all_emails' => $about->emails // Returns the array
        ]);
    }

    // Delete email from db.
    public function destroyEmail(Request $request, About $about)
    {
        $validated = $request->validate([
            'index' => 'required|integer|min:0',
        ]);

        $emails = is_array($about->emails) ? $about->emails : [];

        $index = (int) $validated['index'];
        if (!array_key_exists($index, $emails)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email index.'
            ], 404);
        }

        array_splice($emails, $index, 1);

        $about->emails = array_values($emails);
        $about->save();
        cache()->flush();
        return response()->json([
            'success' => true,
            'index' => $index, 
        ]);
    }

    // Add phone to db.
    public function addPhone(Request $request, About $about) {
        $validated = $request->validate([
            'phone' => 'required',
        ]);

        // Get current phones 
        $phones = $about->phones ?? [];
        
        $newPhone = trim($validated['phone']);
        
        // Check for duplicates (case-insensitive)
        foreach ($phones as $phone) {
            if (strtolower(trim($phone)) === strtolower($newPhone)) {
                return response()->json([
                    'success' => false,
                    'message' => 'This phone already exists.'
                ], 422);
            }
        }
        
        // Add new phone
        $phones[] = $newPhone;
        
        // Save back to database - Laravel will auto-encode to JSON
        $about->phones = array_values($phones);
        $about->save();

        cache()->flush();
        
        return response()->json([
            'success' => true,
            'phone' => $newPhone,
            'all_phones' => $about->phones
        ]);
    }


    public function updatePhone(Request $request, About $about)
    {
        $validated = $request->validate([
            'index' => 'required|integer|min:0',
            'phone' => 'required|max:20',
        ]);

        $phones = is_array($about->phones) ? $about->phones : [];

        if (!array_key_exists($validated['index'], $phones)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid phone index.'
            ], 404);
        }

        $newPhone = $validated['phone'];
        $index = (int) $validated['index'];
        $duplicateAt = array_search(strtolower($newPhone), array_map('strtolower', $phones));
        if ($duplicateAt !== false && $duplicateAt !== $index) {
            return response()->json([
                'success' => false,
                'message' => 'This phone already exists.'
            ], 422);
        }

        $phones[$index] = $newPhone;
        $about->phones = array_values($phones);
        $about->save();
        cache()->flush();
        return response()->json([
            'success' => true,
            'index' => $index,
            'phone' => $newPhone,
        ]);
    }

    public function destroyPhone(Request $request, About $about)
    {
        $validated = $request->validate([
            'index' => 'required|integer|min:0',
        ]);

        $phones = is_array($about->phones) ? $about->phones : [];

        $index = (int) $validated['index'];
        if (!array_key_exists($index, $phones)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email index.'
            ], 404);
        }

        array_splice($phones, $index, 1);

        $about->phones = array_values($phones);
        $about->save();
        cache()->flush();
        return response()->json([
            'success' => true,
            'index' => $index, 
        ]);
    }

    function updateOtherInfo(Request $request, About $about) {
        $validated = $request->validate([
            'company_creation_date' => 'required|integer|min:1900|max:' . date('Y'),
            'awards' => 'required|integer|min:0',
        ]);
        
        $about->update($validated);
        
        cache()->flush();
        
        return response()->json([
            'success' => true,
            'message' => 'Information updated successfully'
        ]);
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $about = About::first();

        // Delete old logo if exists
        if ($about->logo && file_exists(public_path('assets/site/img/' . $about->logo))) {
            unlink(public_path('assets/site/img/' . $about->logo));
        }

        // Store new logo
        $file = $request->file('logo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/site/img/'), $fileName);

        $about->logo = $fileName;
        $about->save();
        cache()->flush();

        return redirect()->back()->with('success', 'Logo updated successfully!');
    }

}
