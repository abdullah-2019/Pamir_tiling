<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Projects;
use App\Models\Contact;
use App\Models\User;

class HomeController extends Controller
{
    public function siteHomePage() {
        $services = Services::all();
        $projects = Projects::inRandomOrder()->take(4)->get();
        return view('welcome', compact('services', 'projects'));
    }

    public function __invoke()
    {
        return view('dashboard', [
            'ServicesCount'    => Services::count(),
            'ProjectsCount'    => Projects::count(),
            'SystemUsersCount' => User::count(),
            'ContactsCount'    => Contact::count(),
        ]);
    }

}
