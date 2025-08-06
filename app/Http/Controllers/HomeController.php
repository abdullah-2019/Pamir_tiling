<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Projects;

class HomeController extends Controller
{
    public function siteHomePage() {
        $services = Services::all();
        $projects = Projects::inRandomOrder()->take(4)->get();
        return view('welcome', compact('services', 'projects'));
    }
}
