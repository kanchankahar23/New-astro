<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalletManagement;
use App\Models\AstrologerDetail;
class WalletManagementController extends Controller
{
    public function walletManagement(Request $request){

        $userId = $request->user_id ?? 2;
        $astrologerId = $request->astrologer_id ??10;
        $source = $request->source ?? 'chat';
        $total_amount = $request->total_amount ?? 2000;
        try {
            $astroDetails = AstrologerDetail::find($astrologerId);
            $agreementPercent = $astroDetails->agreement_percent ?? 50;
            $astrologerAmount = $total_amount * $agreementPercent / 100;
            $adminAmount = $total_amount - $astrologerAmount;
            if (!empty($userId)) {
                $walletManagement = new WalletManagement();
                $walletManagement->user_id = $userId;
                $walletManagement->astrologer_id = $astrologerId;
                $walletManagement->admin_amount = $adminAmount;
                $walletManagement->astrologer_amount = $astrologerAmount;
                $walletManagement->total_amount = $total_amount;
                $walletManagement->source = $source;
                $walletManagement->save();
                return 1;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }


}
