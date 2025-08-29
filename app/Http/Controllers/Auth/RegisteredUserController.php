<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('admin-pages.user.index');
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin-pages.user.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.index', absolute: false));
    }

    public function data(Request $request)
    {
        $query = User::all();

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                return view('admin-pages.user.partials.status', compact('row'))->render();
            })
            ->addColumn('actions', function ($row) {
                $edit = route('user.edit', $row->id);
                return view('admin-pages.user.partials.actions', compact('edit','row'))->render();
            })
            ->rawColumns(['status', 'actions']) // Make sure status is in rawColumns
            ->make(true);
    }

    function edit($user)
    {
        $user = User::where('id', $user)->first();
        return view('admin-pages.user.edit', compact('user'));
    }

    function update(Request $request, $user) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user],
            'status' => ['required', 'in:active,suspend,lock,in_active'],
        ]);
        
        User::where('id', $user)->update($validated);
        
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
}
