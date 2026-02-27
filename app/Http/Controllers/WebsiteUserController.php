<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\WalletManagement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Appointment;
use App\Models\ParasarKundliDetail;
use App\Models\ChatMeeting;
use App\Models\SharedAstrologer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Rashi;
use Hashids;

class WebsiteUserController extends Controller
{
   public function index(){
    $user = User::find(Auth::user()->id);
    $userDetails = UserDetails::where('user_id',$user->id)->first();
    $d = User::with('getWalletInfo')->where('id',Auth::user()->id)->first();
    $rashis = Rashi::get();
    return view('website.web_dashboard',compact('user','userDetails','rashis'));
   }

   public function save_user_details($userId,Request $request){

    try {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
            'mobile' => 'required|string|digits:10',
            'tob' => 'required|date_format:H:i', // Time of birth in 24-hour format (HH:mm)
            'gender' => 'required|in:male,female,other',
            'pob' => 'required|string|max:255', // Place of birth
            'rashi' => 'required|string|max:50', // Zodiac sign
            'about' => 'nullable|string|max:500' // Optional about section, max 500 characters
        ]);

        // Update user information
        $user = User::find($userId);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->save();

        // Update or create user details
        $userDetails = UserDetails::firstOrNew(['user_id' => $userId]);
        $userDetails->dob = $request->dob;
        $userDetails->tob = $request->tob;
        $userDetails->pob = $request->pob;
        $userDetails->rashi = $request->rashi;
        $userDetails->about = $request->about;
        $userDetails->save();

        // Return success message
        return back()->with('success', 'Details saved successfully.');
    } catch (\Exception $e) {
        // Log the error for debugging purposes (optional)
        \Log::error($e->getMessage());

        // Return error message if something goes wrong
        return back()->with('error', $e->getMessage());
    }
   }
   public function upcoming_appointments(){
    $appointments = Appointment::with('astroDetails')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(9);
    $completedAppointments = Appointment::with('astroDetails')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->whereNotNull('amount_paid')->paginate(9);
    return view('website.appointment_list',compact('appointments'));
   }

   public function chat_with(){
    try{
        $astrologers = User::with('astrologerDetail')->where('type', 'astrologer')->paginate(9);
        return view('website.astrologers_list', compact('astrologers'));
    }catch(\Exception $e){
        return back()->with('error', $e->getMessage());
    }
   }

 public function website_dashboard(){

    $chats = ChatMeeting::where('user_id', Auth::user()->id)->pluck('astrologer_id')->toArray();
    $astrologers = User::whereIn('id',$chats)->with('astrologerDetail','astroChat','isActive')->where('type', 'astrologer');
    $astrologers = $astrologers->get();
    $totalChat = DB::table('chat_logs')->where('user_id',Auth::user()->id)->sum('duration');
    $totalChat = gmdate('H:i:s', $totalChat);
    $appointment = Appointment::where('user_id',Auth::user()->id)->where('way_to_reach','video')->count();
    $appointment_calls = Appointment::where('user_id',Auth::user()->id)->where('way_to_reach','phone')->count();
    $user = User::with('userDetails')->where('id',Auth::user()->id)->first();
    return view('website.main_dashboard',compact('astrologers','user','totalChat','appointment','appointment_calls'));
   }

   public function deleteAppointment($id)
   {
       $appointment = Appointment::find($id);
       if (!$appointment) {
           return back()->with('error', 'Appointment not found');
       }
       $appointment->delete();
       return back()->with('success', 'Appointment deleted successfully');
    }

   public function schedule($astro_id){

    try{
              $appointments = Appointment::with('userDetails')
        ->where('astrologer_id', $astro_id)
        ->select('preferred_date','preferred_time','reason','user_id','way_to_reach','name','status')->orderBy('id','DESC')->take(10)->get();

        $astrologer = User::find($astro_id);
        if($astrologer->type == "user" || $astrologer->type == "internal"){
            return abort(403, 'Unauthorized');
        }
        $schedule = [];
        foreach($appointments as $key => $appointment){
            $s = [];
            $date = $appointment->preferred_date ?? '';
            $time = $appointment->preferred_time ?? '';
            $dateTime = $date . ' ' . $time;
            $carbonDateTime = Carbon::parse($dateTime);
            $s['title'] = $appointment->status == 1 ? ucwords($appointment->reason) ?? 'Not Found' : "★ Requested User";
            $s['start'] = $carbonDateTime->format('Y-m-d\TH:i:s');
            $s['image']  =  asset($appointment['userDetails']['avtar']) ?? '';
            $schedule[$key] = $s;
        }
        return view('calender.calender',compact('schedule','astrologer','appointments'));
        }catch(\Exception $e){

            return back()->with('error', "Don't have Enough Balance");
        }
   }

   public function astrologer_search(Request $request)
   {
       $astrologers = User::with('astrologerDetail','isActive')->where('type', 'astrologer');
       if ($request->has('query')) {
           $query = $request->input('query');
           $astrologers = $astrologers->where(function ($queryBuilder) use ($query) {
               $queryBuilder->where('name', 'like', '%' . $query . '%')
                            ->orWhere('mobile', 'like', '%' . $query . '%');
           });
       }
       return  $astrologers->get();
   }


   public function astrologerShare(Request $request){
    $astrologer  = User::where('id', $request->id)->first();
    $users = User::where('type', '!=', 'astrologer')->get();
    return view('website.astrologer_portfolio.astrologer-share', compact('astrologer','users'));
   }

   public function sharedAstrologer(Request $request) {
    $sharedAstrologerId = $request->shared_astrologer;
    foreach ($request->shareToUsers as $userId) {
        $sharedProfile = new SharedAstrologer();
        $sharedProfile->user_id = $userId;
        $sharedProfile->astrologer_id = $sharedAstrologerId;
        $sharedProfile->save();
    }
    return back()->with('success', 'Astrologer shared successfully');
}

    public function chat_list(){
        $chats = ChatMeeting::with('astrologerDetails', 'userDetails')
        ->where('user_id', Auth::user()->id)
        ->orderBy('id', 'DESC')
        ->get();
     return view('astro_chat.chat_history',get_defined_vars());
    }

    public function chat_details($id = null){
        $user = User::find($id);
        $logs = DB::table('chat_logs')
        ->where('user_id', Auth::id())
        ->where('astrologer_id', $id)
        ->orderBy('id','DESC')
        ->paginate(30);
        //return get_defined_vars();
        return view('astro_chat.chat_history_details',get_defined_vars());
    }

    public function transactionHistory($astroId) {
          $debits = WalletManagement::where('astrologer_id', $astroId)->where('user_id', Auth::user()->id)->get();
          $totalDebits = WalletManagement::where('astrologer_id', $astroId)->where('user_id', Auth::user()->id)->sum('total_amount');
        return view('reports.user_debits_history', compact('debits', 'totalDebits'));
    }
}
