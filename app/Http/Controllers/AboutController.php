<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\OurTeam;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        cache()->flush();
        $about = About::all();
        $projects = Projects::inRandomOrder()->take(2)->get();
        $projectCount = Projects::count();
        $ourTeams = OurTeam::all();
        return view('site.about', compact('about', 'projects', 'projectCount', 'ourTeams'));
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
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        // Add debugging
        \Log::info('File received:', ['has_file' => $request->hasFile('logo')]);
        
        if ($request->hasFile('logo')) {
            \Log::info('File details:', [
                'name' => $request->file('logo')->getClientOriginalName(),
                'size' => $request->file('logo')->getSize(),
                'mime' => $request->file('logo')->getMimeType()
            ]);
        }

        $about = About::first();

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($about->logo && \Storage::disk('public')->exists($about->logo)) {
                \Storage::disk('public')->delete($about->logo);
                \Log::info('Old logo deleted');
            }
            
            // Store new logo
            try {
                $logoPath = $request->file('logo')->store('logo', 'public');
                \Log::info('New logo stored at: ' . $logoPath);
                
                $about->logo = $logoPath;
                $about->save();
                
                // Verify the file exists
                if (\Storage::disk('public')->exists($logoPath)) {
                    \Log::info('File verified at: ' . storage_path('app/public/' . $logoPath));
                }
                
            } catch (\Exception $e) {
                \Log::error('File upload error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to upload logo: ' . $e->getMessage());
            }
        }

        cache()->flush();
        return redirect()->back()->with('success', 'Logo updated successfully!');
    }

    // Update our history
    function updateOurHistory(Request $request, About $about) {
        $validated = $request->validate([
            'our_history' => 'required'
        ]);
        
        $about->update($validated);
        
        cache()->flush();
        
        return response()->json([
            'success' => true,
            'our_history' => $validated,
            'message' => 'Information updated successfully'
        ]);
    }


    // Update company_creation_date via AJAX
    public function updateCompanyCreationDate(Request $request)
    {
        // Example validation: allow nullable date, or require a date format
        $validated = $request->validate([
            'company_creation_date' => ['required']
        ]);

        $about = About::firstOrFail();
        $about->company_creation_date = $validated['company_creation_date'];
        $about->save();
        cache()->flush();
        return response()->json([
            'status' => 'success',
            'message' => 'Company creation date updated successfully.',
            'data' => [
                'company_creation_date' => $about->company_creation_date,
            ],
        ]);
    }

    // Update awards via AJAX
    public function updateAwards(Request $request)
    {
        $validated = $request->validate([
            'awards' => ['required', 'string', 'max:5000'], // adjust max as needed
        ]);

        $about = About::firstOrFail();
        $about->awards = $validated['awards'];
        $about->save();
        cache()->flush();
        return response()->json([
            'status' => 'success',
            'message' => 'Awards updated successfully.',
            'data' => [
                'awards' => $about->awards,
            ],
        ]);
    }

}
