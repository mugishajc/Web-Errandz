<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Runner;
use App\Models\Errander;
use App\Models\Account_status;
use App\Models\Onlinestatus;
use App\Models\Loginotp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\Errandz_Login_Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthUserController extends Controller
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

    //showallusers
    public function viewallusers(){
        return User::all();
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
         'firstname'=> 'required|string',
         'lastname' => 'required|string',
         'phone_number'=> 'required|string|unique:users,phone_number',
        //  'profile' =>'required|string',
        //  'nid' => 'required|unique:users,nid',
        //  'dob' => 'required|string',
        //  'address' =>'required|string',
         'email' => 'required|string|unique:users,email',
         'password' => 'required|string|confirmed',
         'usertype' => 'required|string',
         'role_id' => 'required|string',
         'registration_status' => 'required|string',
         //'online_status'=>'required|string',
        ]);


     $user=User::create([
        'role_id' => $fields['role_id'],
        'firstname' => $fields['firstname'],
        'lastname' => $fields['lastname'],
        'phone_number' => $fields['phone_number'],
        'profile' => "null",
        'nid' => "null",
        'dob' => "null",
        'address' => "null",
        'email' => $fields['email'],
        'password' => bcrypt($fields['password']),
        'usertype' => $fields['usertype'],  
        'registration_status' =>$fields['registration_status'],

     ]);

     if($fields['role_id'] =='2'){

     $runner=Runner::create([
        'user_id' => $user->id,
        'category' => $fields['usertype'],
        'description' => 'incomplete registration',
        'live_location_id' => "null",
     ]);
    }else if($fields['role_id'] =='1'){

        $errander=Errander::create([
           'user_id' => $user->id,
           'category' => $fields['usertype'],
           'description' => 'incomplete registration',
           'live_location_id' =>"null",
        ]);
       }



     $token= $user->createToken($fields['email'])->plainTextToken;

     $response=[
        'message'=>'New user Account is registered successfully',
         'user'=> $user,
         'token' => $token
     ];


        return  response($response, 201);
    }

    public function viewRoles(){
        return Role::all();
    }

    public function addRole(Request $request){

        $fields =    $request->validate([
            'user_id' =>'required|string',
            'role_name'=> 'required|string|unique:roles,role_name',
            'description' => 'required|string',
             ]);

             $roles=Role::create([
                'user_id' => $fields['user_id'],
                'role_name' => $fields['role_name'],
                'description' => $fields['description'],
                 ]);
                 $respons=[
                    'message'=>'New role has been saved successfully',
                     'data-roles'=> $roles,
                 ];
            
                    return  response($respons, 201);
      
    }
    public function signinuser(Request $request)
    {
        //
       $fields =  $request->validate([
         'phone_number' => 'required|string',
         'password' => 'required|string',
        ]);

    //check email 
    $user=User::where('phone_number',$fields['phone_number'])->first();
    
    //check password
    if(!$user|| !Hash::check($fields['password'],$user->password)){

        return response([
            'message'=> 'Invalid Credentials'
        ], 401);
    }


     $token= $user->createToken($fields['phone_number'])->plainTextToken;

     $response=[
         'message:'=>'Signed in successfully',
         'user'=> $user,
         'token' => $token
     ];

        return  response($response, 201);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showuser($id)
    {
        //
        $user=User::find($id);
        return $user;
    }

    public function signout(Request $request){
        auth()->user()->tokens()->delete();
        
        return [
            'message' => 'Logged out Successfully'
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
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
        $user=User::find($id);
        $user->update($request->all());  

    //  return $user;

 return response()->json($user,201);
     

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
        User::destroy($id);
        return response([
            'message'=> 'User Account is Deleted Successfully'
        ], 401);
    }

    
public function resendOTP(){
  return new Errandz_Login_Auth();
}

   

    public function Loginsuper(Request $request){
        $this->validate($request, [
        
            'email'=>'required|string',
            'password'=>'required|string|min:6',
       
            ]);
           //check email 
    $usa=User::where('email',$request['email'])->first();
    $chekauth=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
    //check password
    if(!$usa|| !Hash::check($request['password'],$usa->password)){

        return  back()->with('error','Invalid Credentials');

    }else if(( $usa|| !Hash::check($request['password'],$usa->password))&& $chekauth){

        $typ=auth()->user()->usertype;
        $role=auth()->user()->role_id;
    if($typ=='Super' && $role=='0'){
        if(auth()->user()->registration_status =='Mugisha@alpha9(2333375@1?`.,kim'){
        
            Mail::to(auth()->user()->email)->send(new Errandz_Login_Auth());
        return view('auth.ConfirmUser');
        }Auth::logout();
        return back()->with('error','UnAuthorized login ');
    }else{
        Auth::logout();
        return back()->with('error','UnAuthorized login attempts');
    }
    
    }

    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkotp(Request $request){
        $userRecord = Loginotp::where([['user_id','=',Auth::user()->id],['otp','=', $request['email_comfirmation']]])->first();

if($userRecord){

    $checkid = Onlinestatus::where('user_id', '=', Auth::user()->id)->first();
    if ($checkid == null) {
        $otp = new Onlinestatus([
            'user_id'     => Auth::user()->id,
            'status'     =>  'online',
            'last_login'=>Carbon::now(),
            ]);
            $otp->save(); 
    }else{
        DB::table('onlinestatus')->where('user_id',Auth::user()->id)->limit(1)->update(['status' => 'online','last_login'=>Carbon::now()]);
    
    }

    return  redirect()->route('home');
}
    Auth::logout();
    return back()->with('error','Wrong code');

    }

}
