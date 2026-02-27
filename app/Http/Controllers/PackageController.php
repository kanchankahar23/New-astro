<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackageController extends Controller
{
    public function packages()
    {
        try {
            $packages = Package::where('is_active', 1)->orderBy('price', 'ASC')->get();
            return view('website.pricing', compact('packages'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
}
