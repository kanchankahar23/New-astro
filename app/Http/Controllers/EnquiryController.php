<?php

namespace App\Http\Controllers;

use App\Events\AppointmentNotification;
use App\Imports\EnquiryImport;
use App\Models\Appointment;
use App\Models\AstrologerDetail;
use App\Models\Payment;
use App\Models\ChatMeeting;
use App\Models\Remark;
use App\Models\User;
use App\Models\UserEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use \App\Models\Package;
use DateTime;
use App\Notifications\AppointmentRequestNotification;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\ElseIf_;
use App\Mail\AppointmentCreatedMail;
use Illuminate\Support\Facades\Mail;
use Exception;

class EnquiryController extends Controller
{
    public function enquiry_list(Request $request)
    {
        try {
            $enquiries = UserEnquiry::where('type', 'astrologer')->orderBy('id', 'DESC');
            $name = $request->name;
            $phone = $request->phone;
            $email = $request->email;
            if (!empty($name)) {
                $enquiries = $enquiries->where('name', 'like', '%' . $name . '%');
            }
            if (!empty($phone)) {
                $enquiries = $enquiries->where('mobile', 'like', '%' . $phone . '%');
            }
            if (!empty($email)) {
                $enquiries = $enquiries->where('email', 'like', '%' . $email . '%');
            }
            $enquiries = $enquiries->paginate(20);
            $enquiriesCount = $enquiries->count();
            foreach ($enquiries as $enquiry) {
                if ($enquiry->gender == "male") {
                    $enquiry["icon"] = asset('images/male.jpg');
                } else {
                    $enquiry["icon"] = asset('images/female.png');
                }
            }
            return view('enquiry.enquiry_list', compact('enquiries', 'name', 'phone', 'email', 'enquiriesCount'));
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function enquiry_form()
    {
        try {
            return view('enquiry.enquiry_form');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function enquiry_save(Request $request)
    {
        try {
            // return $request->all();
            $request->validate([
                'name' => 'required|string|max:255',
                // 'email' => 'required|unique:user_enquiry,email',
                'mobile' => 'required|string|max:20',
                'gender' => 'required|string',
                'status_id' => 'required',
                'remark' => 'required',

            ]);

            $enquiry = new UserEnquiry();
            $enquiry->type = $request->enquiry_type;
            $enquiry->name = $request->name;
            $enquiry->email = $request->email ?? null;
            $enquiry->mobile = $request->mobile;
            $enquiry->education = $request->education ?? null;
            $enquiry->gender = $request->gender;
            $enquiry->status_id = $request->status_id ?? 1;
            $enquiry->created_by = Auth::user()->id;
            $enquiry->source = "internal";
            if (!empty($request->expertise)) {
                $enquiry->expertise = implode(',', $request->expertise) ?? '';
            }
            $enquiry->image = saveUserImage($request->imageBaseString);
            $enquiry->save();
            if ($request->remark) {
                $remark = new Remark();
                $remark->remark = $request->remark;
                $remark->user_id = Auth::user()->id;
                $remark->enquiry_id = $enquiry->id;
                $remark->save();
            }
            return redirect('website-enquiry');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new EnquiryImport, $request->excel);
            return back()->with('success', 'Enquiry added Successfully');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function website_enquiry(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'mobile' => 'required|string|max:20',
                'type' => 'required|string|max:255',
                'gender' => 'required|string',
                'message' => 'required|string',
                'g-recaptcha-response' => 'required',
            ]);

            $recaptchaResponse = $request->input('g-recaptcha-response');
            $googleResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip(),
            ]);

            if (!$googleResponse->json('success')) {
                return back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed.'])->withInput();
            }
            $enquiry = new UserEnquiry();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->mobile = $request->mobile;
            $enquiry->gender = $request->gender;
            $enquiry->type = $request->type;
            $enquiry->message = $request->message;
            $enquiry->source = "website";
            $enquiry->save();
            return back()->with('success', 'Message sent successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. ' . $e->getMessage());
        }
    }
    // public function website_enquiry(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|email',
    //             'mobile' => 'required|string|max:20',
    //             'type' => 'required|string|max:255',
    //             'gender' => 'required|string',
    //             'message' => 'required|string',

    //         ]);
    //         $enquiry = new UserEnquiry();
    //         $enquiry->name = $request->name;
    //         $enquiry->email = $request->email;
    //         $enquiry->mobile = $request->mobile;
    //         $enquiry->gender = $request->gender;
    //         // $enquiry->specialization = $request->type;
    //         $enquiry->type = $request->type;
    //         $enquiry->message = $request->message;
    //         $enquiry->save();
    //         return back()->with('success', 'Message sent Successfully');
    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //         // return $e->getMessage();
    //     }
    // }

    public function appointment_list(Request $request)
    {
        try {
            $appointments = Appointment::orderBy('id', 'DESC');
            $name = $request->name;
            $phone = $request->phone;
            $email = $request->email;
            if (isset($request->name)) {
                $appointments = $appointments->orWhere('name', 'like', '%' . $request->name . '%');
            }
            if (isset($request->phone)) {
                $appointments = $appointments->orWhere('mobile', 'like', '%' . $request->phone . '%');
            }
            if (isset($request->email)) {
                $appointments = $appointments->orWhere('email', 'like', '%' . $request->email . '%');
            }
            $appointments = $appointments->paginate(20);
            foreach ($appointments as $appointment) {
                if ($appointment->gender == "male") {
                    $appointment["icon"] = asset('images/male.jpg');
                } else {
                    $appointment["icon"] = asset('images/female.png');
                }
            }
            return view('appointment.appointment_list', compact('appointments'));
        } catch (\Exception $e) {
        }
    }

    public function appointment($astro_id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'duration' => 'required|string',
                'gender' => 'required|string',
                'dob' => 'required',
                'place' => 'required',
                'reason' => 'required|string',
                'preferred_date' => 'required|string',
                'method' => 'required|string',
            ]);

            $astrologer = User::find($astro_id);
            $price_per_min = $astrologer->astrologerDetail->charge_per_min;
            $formattedBalance = getBalanceAmount();
            $cleanedBalance = str_replace(',', '', $formattedBalance);
            $balance = (float) $cleanedBalance;
            if ($balance > $price_per_min * (int) $request->duration) {
                $appointment = new Appointment();
                // $appointment = Appointment::firstOrNew(['user_id' => Auth::user()->id, 'astrologer_id' => $astro_id]);
                $datetime = $request->dob;
                $dateTimeObj = new DateTime($datetime);
                $formattedDate = $dateTimeObj->format('Y-m-d');
                $formattedTime = $dateTimeObj->format('H:i');
                $appointment->user_id = Auth::user()->id;
                $appointment->name = $request->name ?? null;
                $appointment->email = $request->email ?? null;
                $appointment->phone = $request->phone ?? null;
                $appointment->gender = $request->gender ?? null;
                $appointment->dob = $formattedDate ?? null;
                $appointment->tob = $formattedTime ?? null;
                $appointment->place = $request->place ?? null;
                $appointment->lat = $request->lat ?? 23.5869;
                $appointment->lon = $request->lon ?? 79.5664;
                $appointment->duration = $request->duration ?? null;
                $appointment->preferred_date = date('Y-m-d', strtotime($request->preferred_date)) ?? null;
                $appointment->preferred_time = date('H:i', strtotime($request->preferred_date)) ?? null;
                $appointment->address = $request->address ?? null;
                $appointment->way_to_reach = $request->method ?? null;
                $appointment->reason = $request->reason ?? null;
                $appointment->astrologer_id = $astro_id;
                $appointment->save();
                // $payment = new Payment();
                // $payment->user_id = Auth::user()->id;
                // $payment->name = Auth::user()->name;
                // $payment->date = $appointment->created_at;
                // $payment->debits = $price_per_min * (int) $request->duration;
                // $payment->save();
                // if (isset($payment)) {
                //     $appointment->amount_paid = $payment->debits;
                //     $appointment->save();
                // }
                if ($appointment->save()) {
                    $emails = ['honey.nema@white-force.in', 'dharna.thakur@white-force.in'];
                    foreach ($emails as $email) {
                        Mail::to($email)->send(new AppointmentCreatedMail($appointment));
                    }
                }
                event(new AppointmentNotification($appointment));
                return redirect('upcoming-appointments')->with('success', 'Appointment scheduled successfully');
            } else {
                $neededBalance = (float) $request->duration * (float) $price_per_min - getBalanceAmount();
                return back()->with([
                    'error' => "You don't have enough balance",
                    'neededBalance' => $neededBalance,
                    'flex' => 'flex',
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete_appointment($id)
    {
        try {
            $appointment = Appointment::find($id);
            $appointment->delete();
            return back();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteEnquiry(Request $request){
       $enquiry = UserEnquiry::find($request->id);
       $enquiry->delete();
       return back()->with(['success'=>"Enquiry Deleted Successfully"]);
    }

    public function saveChatBotResponse(Request $request)
    {
        //  return $request->all();
        try {
            $validated = $request->validate([
                'user_type' => 'required|string|max:255',
                'user_name' => 'required|string|max:255',
                'user_phone' => 'required|string|max:20',
                'service_selected' => 'required|string|max:255',
                'conversation' => 'required|array'
            ]);
            
            $chatbotResponse = new UserEnquiry();
            $chatbotResponse->type = $validated['user_type'];
            $chatbotResponse->name = $validated['user_name'];
            $chatbotResponse->mobile = $validated['user_phone'];
            $chatbotResponse->service_selected = $validated['service_selected'];
            $chatbotResponse->conversation = json_encode($validated['conversation']);
            $chatbotResponse->source = "website";
            $chatbotResponse->country = $request->userCountry  ?? null;
            $chatbotResponse->c_code = $request->userCountryCode ?? null;
            $chatbotResponse->save();
            return response()->json(['success' => true, 'message' => 'Chatbot response saved successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'message' => $e->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function websiteEnquiry(Request $request, $enquiryType = null, $type = null ){
        try {
            $fromDate = $request->from ;
            $toDate = $request->to ;
            $name = $request->name;
            $phone = $request->phone;
            $type = $request->type ?? $type;
            $statusId = $request->status_id;
            $leadSource = $request->lead_source;
            $country = $request->country;
            if (!empty($fromDate) && !empty($toDate)) {
                 $enquiries = UserEnquiry::where('source', $enquiryType)->orderBy('id', 'DESC')->whereBetween('created_at', array($fromDate . ' 00:00:00', $toDate . ' 23:59:59'));
            }
            else {
                $enquiries = UserEnquiry::where('source', $enquiryType)->orderBy('id', 'DESC');
            }

            if (!empty($name)) {
                $enquiries = $enquiries->where('name', 'like', '%' . $name . '%');
            }
            if (!empty($phone)) {
                $enquiries = $enquiries->where('mobile', 'like', '%' . $phone . '%');
            }
            if (!empty($type)) {
                $enquiries = $enquiries->where('type', 'like', '%' . $type . '%');
            }
            if (!empty($statusId)) {
                $enquiries = $enquiries->where('status_id', 'like', '%' . $statusId . '%');
            }
            if (!empty($leadSource)) {
                $enquiries = $enquiries->where('lead_source', 'like', '%' . $leadSource . '%');
            }
            if (!empty($country)) {
                $enquiries = $enquiries->where('country', 'like', '%' . $country . '%');
            }
            $remarkEnquiryIds = [];
            if (!empty($request->remark_from_date)) {
                
                $remark_from_date = $request->remark_from_date;
                  $remark_to_date = $request->remark_to_date;
                $remarkEnquiryIds = Remark::whereBetween('created_at', [$remark_from_date, $remark_to_date])->pluck('enquiry_id')->toArray();
                $enquiries = UserEnquiry::whereIn('id', $remarkEnquiryIds)->orderBy("id", "desc");
                if (!empty($name)) {
                    $enquiries = $enquiries->where('name', 'like', '%' . $name . '%');
                }
                if (!empty($phone)) {
                    $enquiries = $enquiries->where('mobile', 'like', '%' . $phone . '%');
                }
                if (!empty($type)) {
                    $enquiries = $enquiries->where('type', 'like', '%' . $type . '%');
                }
                if (!empty($statusId)) {
                    $enquiries = $enquiries->where('status_id', 'like', '%' . $statusId . '%');
                }
                if (!empty($leadSource)) {
                    $enquiries = $enquiries->where('lead_source', 'like', '%' . $leadSource . '%');
                }
                if (!empty($country)) {
                    $enquiries = $enquiries->where('country', 'like', '%' . $country . '%');
                }
                $enquiryCount = $enquiries->count();
                $enquiries = $enquiries->orderBy("id", "desc")->paginate(25);

                return view('website.website_chatbot_enquiry', compact('enquiries', 'name', 'phone', 'enquiryCount', 'type', 'enquiryType', 'fromDate', 'toDate', 'statusId', 'remark_from_date', 'remark_to_date', 'leadSource', 'country' ));
            }
            $enquiryCount = $enquiries->count();
            $enquiries = $enquiries->paginate(25);
            return view('website.website_chatbot_enquiry', compact('enquiries','name', 'phone', 'enquiryCount', 'type', 'enquiryType', 'fromDate', 'toDate', 'statusId','leadSource', 'country'));
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function appointmentForm($appointmentType, $astro_id){
        return view('website.appointment', compact('appointmentType', 'astro_id'));
    }
    public function bookAppointment(Request $request)
    {
        // return $request->all();
        $request->validate([
            'appointment_type' => 'required',
            'astrologer_id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'tob' => 'required',
            'place' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $astro_id = decrypt($request->astrologer_id);
        $astrologer = User::find($astro_id);
        $price_per_min = $astrologer->astrologerDetail->charge_per_min;
        $formattedBalance = getBalanceAmount();
        $cleanedBalance = str_replace(',', '', $formattedBalance);
        $balance = (float) $cleanedBalance;
        $rate = (float) $price_per_min;
        $duration = (int) $request->duration;

        if ($request->appointment_type == 'phone' || $request->appointment_type == 'video') {
            if ($balance > $price_per_min * (int) $request->duration) {
                $appointment = new Appointment();
                // $appointment = Appointment::firstOrNew(['user_id' => $user_id, 'astrologer_id' => $astro_id]);
                $appointment->user_id = $user_id;
                $appointment->astrologer_id = $astro_id;
                $appointment->name = $request->name ?? null;
                $appointment->phone = $request->mobile ?? null;
                $appointment->gender = $request->gender ?? null;
                $appointment->dob = $request->dob ?? null;
                $appointment->tob = $request->tob ?? null;
                $appointment->place = $request->place ?? null;
                $appointment->lat = $request->lat ?? 23.5869;
                $appointment->lon = $request->lon ?? 79.5664;
                $appointment->duration = $request->duration ?? null;
                $appointment->way_to_reach = $request->appointment_type ?? null;
                $appointment->preferred_date = date('Y-m-d', strtotime($request->preferred_date)) ?? null;
                $appointment->preferred_time = date('H:i', strtotime($request->preferred_date)) ?? null;
                $appointment->save();
                event(new AppointmentNotification($appointment));
                // $astrologer->notify(new AppointmentRequestNotification($appointment));
                return redirect('upcoming-appointments')->with('success', 'Appointment scheduled successfully');
            } else {
                $neededBalance = (float) $request->duration * (float) $price_per_min - $balance;
                return back()->with([
                    'error' => "You don't have enough balance",
                    'neededBalance' => $neededBalance,
                ]);
            }
        } else {

            if ($price_per_min < $balance) {
                if (isset($astrologer)) {
                    $meeting = ChatMeeting::firstOrNew(['user_id' => $user_id, 'astrologer_id' => $astrologer->id]);
                    $meeting->user_id = $user_id;
                    $meeting->astrologer_id = $astrologer->id;
                    $meeting->user_encrypt = generateRandomString();
                    $meeting->astro_encrypt = generateRandomString();
                    $meeting->name = $request->name ?? null;
                    $meeting->phone = $request->mobile ?? null;
                    $meeting->gender = $request->gender ?? null;
                    $meeting->dob = $request->dob ?? null;
                    $meeting->tob = $request->tob ?? null;
                    $meeting->place = $request->place ?? null;
                    $meeting->lat = $request->lat ?? 23.5869;
                    $meeting->lon = $request->lon ?? 79.5664;
                    $meeting->wallet = $balance;
                    $meeting->charge_per_min = $astrologer->astrologerDetail->charge_per_min;
                    $meeting->is_stop = 1;
                    $meeting->is_complete = 2;
                    $meeting->timer = floor(($balance / $astrologer->astrologerDetail->charge_per_min) * 60);
                    $meeting->balance_time = $meeting->timer;
                    $meeting->save();
                    event(new AppointmentNotification($meeting));
                    // return redirect('chatify/' . $meeting->astro_encrypt);
                    return redirect('chat-list/');
                }
            } else {
                return redirect()->back()->with('error', 'Insufficient balance');
            }
        }
    }

    public function changeStatus(Request $request)
    {
        $enquiryId = $request->input('enquiryId');
        $newStatus = $request->input('newStatus');

        $Enquiry = UserEnquiry::find($enquiryId);

        if ($Enquiry) {
            $Enquiry->status_id = $newStatus;
            $Enquiry->save();

            return response()->json([
                'success' => true,
                'newStatus' => $newStatus,
                'enquiryId' => $enquiryId,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Enquiry not found'
        ], 404);
    }
}
