<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    public function wallet()
    {
        try {
            $plans = Package::where('is_active', 1)->orderBy('price', 'ASC')->get();
            $payments = Payment::where('status', 'completed')
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'DESC')
                ->get();
            $totalAmount = Payment::where('status', 'completed')->where('user_id', Auth::user()->id)->sum('credits');
            $totalBonusAmount = Payment::where('status', 'completed')->where('user_id', Auth::user()->id)->sum('bonus');
            return view('website.wallet', compact('plans', 'payments', 'totalAmount', 'totalBonusAmount'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function rechargeHistory($id)
    {
        try {
            $payment = Payment::where('status', 'completed')->find($id);
            return view('payment.invoice', compact('payment'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function addMoney(Request $request)
    {
        try {
            $plan = Package::find($request->pkg_id);
            $payments = Payment::where('status', 'completed')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            return view('payment.payment', compact('plan', 'payments'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
    public function addAmount(Request $request)
    {
        try {

            return view('payment.add_user_define_money');
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function bonusInvoice($id)
    {
        try {
            $payment = Payment::where('status', 'completed')->find($id);
            return view('payment.bonus-invoice', compact('payment'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function allInvoice()
    {
        try {
            $payment = Payment::where('status', 'completed')->where('user_id', Auth::user()->id)->first();
            $payments = Payment::where('status', 'completed')->where('user_id', Auth::user()->id)->get();
            $sumofAmount = Payment::where('status', 'completed')->where('user_id', Auth::user()->id)->sum('amount');
            return view('payment.all-user-transection', compact('payments', 'payment', 'sumofAmount'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }



}
