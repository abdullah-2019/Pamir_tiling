<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;


class AboutAddressController extends Controller
{
    public function updateCountry(Request $request, About $about)
    {
        $data = $request->validate([
            'value' => ['required', 'string', 'max:100'],
        ]);

        $about->country = $data['value'];
        $about->save();
        cache()->flush();

        return response()->json([
            'success' => true,
            'value' => $about->country,
        ]);
    }

    public function updateCity(Request $request, About $about)
    {
        $data = $request->validate([
            'value' => ['required', 'string', 'max:100'],
        ]);

        $about->city = $data['value'];
        $about->save();
        cache()->flush();

        return response()->json([
            'success' => true,
            'value' => $about->city,
        ]);
    }

    public function updateAddress(Request $request, About $about)
    {
        $data = $request->validate([
            'value' => ['nullable', 'string', 'max:255'],
        ]);

        $about->address = $data['value'];
        $about->save();
        cache()->flush();

        return response()->json([
            'success' => true,
            'value' => $about->address,
        ]);
    }
}
