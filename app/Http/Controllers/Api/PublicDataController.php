<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PublicDataController extends Controller
{
   public function index(Request $request){

    try {

        DB::table('knowlarity_response')->insert([
            'response' => json_encode($request->data),
        ]);

        $latestResponse = DB::table('knowlarity_response')->latest('id')->first();

        return response()->json([
            'status' => 'success',
            'message' => 'Data inserted successfully',
            'data' => [
                'id' => $latestResponse->id,
                'response' => json_decode($latestResponse->response, true),
                'created_at'=> Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ],201);

    } catch (\Exception $e) {
        return response()->json(["message" => $e->getMessage()],500);
    }
  }
}
