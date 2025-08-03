<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class HomeController extends Controller
{
    public function siteHomePage() {
        $services = Services::all();
        return view('welcome', compact('services'));
    }
}
