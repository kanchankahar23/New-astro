<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use App\Models\AstrologerGallary;

class WebsiteController extends Controller
{

   public function dashboard(){
    if(Auth::user()->type == 'user'){
        return redirect('user-dashboard');
    }
    elseif(Auth::user()->type == 'astrologer'){
        return redirect('astrologer-dashboard');
    }
    else{
        return redirect('admin/dashboard');
    }
   }

   public function index(){
    $astrologers = User::where('type','astrologer')->get();
    return view ('website.home',compact('astrologers'));
   }

   public function horoscope($id){
    return view('website.horoscope', compact('id'));
   }

   public function numerology(){
    return view('website.numerology');
   }

   public function vastu_shastra(){
    return view('website.vastu_shastra');
   }

   public function signature(){
    return view('website.signature');
   }

   public function kundli(){
    return view('website.kundli');
   }

   public function appointment(){
    return view('website.appointment');
   }

   public function contact_us(){
    return view('website.contact_us');
   }


   public function astrologers(){
    $astrologers = User::where('type','astrologer')->paginate(12);
    return view('website.astrologer',compact('astrologers'));
   }

   public function profile(){
    return view('website.profile');
   }

   public function chat(){
    $currentUser = Auth::user()->id;
    $currentType = Auth::user()->type;

    if($currentType == 'astrologer'){
        $users = User::where('type','user')->whereNot('id',$currentUser)->select('name','avtar','id');
    }elseif($currentType == 'user'){
        $users = User::where('type','astrologer')->whereNot('id',$currentUser)->select('name','avtar','id');
    }else{
        $users = User::where('type','internal')->whereNot('id',$currentUser)->select('name','avtar','id');
    }
    $users = $users->get();
    return view('website.chatbox',compact('users'));
   }

   public function save_profile_picture($userId,Request $request){
        $user = User::find($userId);
        $previousPath = $user->avtar;
        $user->avtar = saveBase64Image($request->imageBaseString);
        $user->save();
        if ($previousPath && file_exists(public_path($previousPath))) {
            unlink(public_path($previousPath));
        }
        return back()->with('success','Profile Image Changed Successfully');
   }
   public function astrologerDetail(){
        $users = User::where('type', 'astrologer')->get();
        return view('astrologer_detail.astrologer_detail', compact('users'));
   }

   public function panditProfile($id){
    $astrologer = User::find($id);
    return view('astrologer_detail.astrologer_detail', compact('astrologer'));
   }

    public function portfolio($id)
    {
        $user = User::where('type', 'astrologer')->with('astrologerDetail')->where('slug', $id)->first();
        // if (!(isset($user))) {
        //    return redirect('/');
        // }
        $gallerys = AstrologerGallary::where('user_id', $user->id)->first();
        if (isset($user)) {
            return view('website.astrologer_portfolio.new_portfolio', compact('user', 'gallerys'));
        } else {
            return back();
        }
    }
   

   public function privacyAndpolicy(){
    return view('website.privecy.privacypolicy');
   }

   public function termsAndCondition(){
    return view('website.privecy.terms-condition');
   }

   public function divineStone(){
    return view('divine_stone.index');
   }
}
