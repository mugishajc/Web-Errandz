<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\DebitErrAnDz;
use App\Models\CreditErrAnDz;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

class UmufungoController extends Controller
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

public function kubika_uMufunGoo(Request $request){
    $rules = [
        'user_id' => 'required',
        'amount' => 'required',
        'status' => 'required',
        'description'=>'required'
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        return response()
        ->withInput()
        ->withErrors($validator);
    }
    else{
        $data = $request->input();
        try{
            $done = new CreditErrAnDz;
            $done->user_id = $data['user_id'];
            $done->amount = $data['amount'];
            $done->status = $data['status'];
            $done->description = $data['description'];
            $done->telephone = $data['telephone'];
            $done->save();
            
            $r=[
                'message'=>'Success',
                // 'data'=> $done,
             ];

            return response()->json($r,207);
            // return response()->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return response()->with('failed',"operation failed");
        }
    }
}

public function Ikofi_yanjYE(Request $request){
  //
    $request->validate([
    'User_Id'=> 'required|string', ],['required'=>"User ID is neceesary "]);
     
    $donne=  DB::table('crediterrandz')
   
    ->where('user_id','=',$request->get('User_Id'))
    ->get();

    $respon=[ 'message'=>'ok',
         'Balance'=>   $donne,
     ];
    return response()->json($respon,206); 


}

}
