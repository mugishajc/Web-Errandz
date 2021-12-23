<?php

namespace App\Http\Controllers;

use App\Models\LiveLocation;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserLiveLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $fields =  $request->validate([
            'userID'=>'required',
            'name_address'=> 'required|string',
            'latitude'=>'required|string',
            'longitude'=>'required|string',
            'date'=>'required|string',
            'time'=>'required|string',
            'status'=>'required|string'

           ]);

           $live=LiveLocation::create([
            'user_id' => $fields['userID'],
            'name_address' => $fields['name_address'],
            'latitude' => $fields['latitude'],
            'longitude' => $fields['longitude'],
            'date' => $fields['date'],
            'time' => $fields['time'],
            'status' => $fields['status'],
            
         ]);
         return response()->json(['message'=>'success'],201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
