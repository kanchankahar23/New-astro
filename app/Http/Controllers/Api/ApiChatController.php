<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApiChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return response()->json(['message' =>'success','data'=>Auth::user()->id],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            return response()->json(['message' =>'success','data'=>"create"],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return response()->json(['message' =>'success','data'=>"store"],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{

            return response()->json(['message' =>'success','data'=>Auth::user()->id],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            return response()->json(['message' =>'success','data'=>"edit"],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            return response()->json(['message' =>'success','data'=>"update"],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            return response()->json(['message' =>'success','data'=>"delete"],200);
        }catch(\Exception $e){
            return response()->json(['message' => 'error','data' => $e->getMessage()],500);
        }
    }
}
