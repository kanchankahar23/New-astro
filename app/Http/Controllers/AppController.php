<?php

namespace App\Http\Controllers;

use App\Models\AppBanner;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function addAppointmentBanner(){
        $banner = AppBanner::get();
        return view('app.add_appointment_banner', compact('banner'));
    }
    public function saveBanner(Request $request){
        $request->validate([
            'link' => 'required',
            'banner_type' => 'required',
            'status' => 'required',
        ]);
        $banner = new AppBanner();
        if ($request->imageBaseString) {
            $image_code = $request->imageBaseString;
            $basePath = "app-banner/";
            $fileName = saveImage($image_code, $basePath);
            $banner->image = $fileName;
        }
        $banner->banner_type = $request->banner_type;
        $banner->link = $request->link;
        $banner->status = $request->status;
        $banner->save();
        if (isset($banner->id)) {
            $banner->short_order = $banner->id;
            $banner->save();
        }
        return back()->with('success', 'Banner added successfully');
    }
    public function editBanner(request $request)
    {
        try {
            $id = $request->id;
            $banner = AppBanner::find($id);
            return view('app.edit_appointment_banner', compact('banner'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
    public function updateBanner(Request $request, $id){

        $request->validate([
            'link' => 'required',
            'banner_type' => 'required',
            'status' => 'required',
            'short_order' => 'required',
        ]);
        $banner =  AppBanner::find($id);
        // if ($request->imageBaseString) {
        //     $image_code = $request->imageBaseString;
        //     $basePath = "app-banner/";
        //     $fileName = saveImage($image_code, $basePath);
        //     $banner->image = $fileName;
        // }
        $banner->banner_type = $request->banner_type;
        $banner->link = $request->link;
        $banner->status = $request->status;
        $banner->short_order = $request->short_order;
        $banner->update();
        return back()->with('success', 'Banner updated successfully');
    }
    public function deleteBanner($id){
        $banner = AppBanner::find($id);
        $banner->delete();
        return back()->with('success', 'Banner deleted successfully');
    }
}
