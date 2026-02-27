<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AstrologerDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UtilityController extends Controller
{
   public function setRating(Request $request){
        try{
            $rating = AstrologerDetail::where('user_id',$request->astrologer_id)->first();
            $rating->rating_count = $rating->rating_count + 1;
            $rating->save();
            $newRating = $rating->rating + $request->rating;
            $rating->rating =  round($newRating / 2);
            $rating->save();
            $review = DB::table('ratings')->insert([
                "user_id" => Auth::user()->id ?? null,
                "astrologer_id" => $request->astrologer_id ?? null,
                "type" => $request->type ?? '',
                "feedback" => $request->feedback ?? '',
                "rating" => $request->rating ?? '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return response()->json(['message'=>$request->astrologer_id],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
   }
}
