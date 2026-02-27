<?php

namespace App\Http\Controllers;

use App\Models\ChatbotResponse;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function saveChatBotResponse(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_type' => 'required|string|max:255',
                'user_name' => 'required|string|max:255',
                'user_phone' => 'required|string|max:15',
                'service_selected' => 'required|string|max:255',
                'conversation' => 'required|array'
            ]);
            $chatbotResponse = new ChatbotResponse();
            $chatbotResponse->user_type = $validated['user_type'] ;
            $chatbotResponse->user_name = $validated['user_name'] ;
            $chatbotResponse->user_phone = $validated['user_phone'] ;
            $chatbotResponse->service_selected = $validated['service_selected'];
            $chatbotResponse->conversation = json_encode($validated['conversation']);
            $chatbotResponse->save();
            return response()->json(['success' => true, 'message' => 'Chatbot response saved successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'message' => $e->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function chatbotEnquiry(Request $request){

        try {
            $enquiries = ChatbotResponse::orderBy('id', 'DESC');
            $name = $request->name;
            $phone = $request->phone;
            if (!empty($name)) {
                $enquiries = $enquiries->where('user_name', 'like', '%' . $name . '%');
            }
            if (!empty($phone)) {
                $enquiries = $enquiries->where('user_phone', 'like', '%' . $phone . '%');
            }
            $enquiries = $enquiries->paginate(15);
            return view('website.website_chatbot_enquiry', compact('enquiries','name', 'phone',));
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
