<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Task_categories;
use App\Models\Task_status;
use App\Models\Task;
use App\Models\ApprovedErrandz;
use App\Models\JobRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\Onlinestatus;
class TaskController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTaskcategory(Request $request){

        $fields =  $request->validate([
             'type'=> 'required|string',
            'name' => 'required|string|unique:task_categories,name',
            'description'=> 'required|string',
           
           ]);
           $cate=Task_categories::create([
            'type' => $fields['type'],
            'name' => $fields['name'],
            'description' => $fields['description'],
             ]);
             $respons=[
                'message'=>'New Task Category has been saved successfully',
                 'data_Task_Category'=> $cate,
             ];
             return  response($respons, 201);
   
    }
public function viewtasks_category(){

    $l=Task_categories::all();
        return response()->json(['data' => $l], 200);

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
    public function createTasks(Request $request)
    {
        //post tasks
        
       
            $errand = new Task([
                'category_id'    =>  $request->get('category_id'),
                'sourceLatitude'     =>  $request->get('sourceLatitude'),
                'sourceLongitude'     =>  $request->get('sourceLongitude'),
                'destinationLatitude'     =>  $request->get('destinationLatitude'),
                'destinationLongitude'     =>  $request->get('destinationLongitude'),
                'title'     =>  $request->get('title'),
                'description'     =>  $request->get('description'),
                'user_id'     =>  $request->get('user_id'),
                'single_pointLatitude'     =>  $request->get('single_pointLatitude'),
                'single_pointLongitude'     =>  $request->get('single_pointLongitude'),
                'photo_url1'     =>  $request->get('photo_url1'),
                'photo_url2'     => $request->get('photo_url2'),
                'price'     =>  $request->get('price'),
                'currency'     => $request->get('currency'),
                'status_id'     =>  $request->get('status_id'),
                'date'     =>  $request->get('date'),
                'time'    =>$request->get('time'),
    
                ]);
                $errand->save(); 

        
             $respon=[
                'message'=>'New Errand has been posted successfully',
                 'code'=>  "200",
             ];

        return response()->json( $respon, 200);
    //  return response()->json($request,201);  
     
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function addTaskstatus(Request $request){
    $this->validate($request, [
        
        'name'=>'required|string|unique:task_status,name',
        'description'=>'required|string|min:6',
   
        ]);

        $T_status = new Task_status([
            'user_id'     => Auth::user()->id,
            'name'     =>  $request->get('name'),
            'description'     =>  $request->get('description'),
            
            ]);
            $T_status->save(); 

            $respon=[
                'message'=>'New Task has been saved successfully',
                 'Data-Task-Status'=>  $T_status,
             ];
             return  response($respon, 201);

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
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function fetchalltasks(){
    
    
    $UD= DB::table('task')
    ->where('status_id','=','Active')
    ->get();

    $respon=[
        'message'=>'ok',
         'Data'=>   $UD,
     ];
    // return response($respon,201);

    return response()->json($respon,200); 
}
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function saveonlinestatus(Request $request){

    $this->validate($request, [
        'user_id'=>'required|string',
        ]);

        $che= User::where('id',$request['user_id'])->first();
        if($che == null){
            return response(['message:Sorry,Invalid request'],401);
        }

      $checkid = Onlinestatus::where('user_id', '=',$request['user_id'])->first();
     if ($checkid == null) {
         $ot = new Onlinestatus([
             'user_id'     => Auth::user()->id,
             'status'     =>  'online',
             'last_login'=>Carbon::now(),
             ]);
             $ot->save(); 
             return response(['message:','success'],201);
     }else{
         DB::table('onlinestatus')->where('user_id',$request['user_id'])->limit(1)->update(['status' => 'online','last_login'=>Carbon::now()]);
         return response(['message:success'],201);
     }

    }

public function apply_request(Request $request){

   $jobid=$request->get('taskID');
   $runid=$request->get('runnerID');
   if(JobRequest::where('taskID','=',$jobid)->where('runnerID','=',$runid)->first()){

    return response(['message'=>'Already applied',200]);
   }

    $usi=JobRequest::create([
                    'taskID' =>  $request->get('taskID'),
                    'runnerID' =>$request->get('runnerID'),
                    'job_requests_status'=>$request->get('job_requests_status'),
            
                 ]);
     $res=[ 'message'=>'applied'];
     return response()->json($res,201);  
}

public function viewactive_offer(Request $request){
    $UD= DB::table('task')
    ->where('user_id', '=',$request->get('UserID') )
    ->where('status_id','=','Active')
    ->get();

    $respond=['message'=>'ok','data'=>$UD];
    return response()->json($respond,201);
}

public function viewall_offer(Request $request){
    $U= DB::table('task')
    ->where('user_id', '=',$request->get('UserID') )
    ->get();

    $re=['message'=>'ok','data'=>$U];
    return response()->json($re,201);
}

public function view_applied_runner_posts(Request $request){
   
 
    $trans=JobRequest::with(['Runner'])
    ->where('taskID', '=',$request->get('TaskID') )
    ->get();
        return response()->json(['data' => $trans], 201);
   
}

public function approve_runner_toperformjob(Request $request){
   

  JobRequest::where('taskID', '=', $request->get('taskID'))
->update(['job_requests_status' => $request->get('status')]);

Task::where('id', '=', $request->get('taskID'))
->update(['status_id' => $request->get('status'),
'taken_by'=>$request->get('takenBY')]);

       
 return response()->json(['message'=>'successfully approved by Errander'],201);
}
public function deny_runner_toperformjob(Request $request){
    JobRequest::where( 'taskID', '=', $request->get('taskid'))
    ->where('runnerID','=',$request->get('runnerid'))
->update(['job_requests_status' => $request->get('status')]);

return response()->json(['message'=>'successfully denied by Errander'],201);

}

public function viewtaskdata(Request $request){

$data=Task::where('id', '=', $request->get('taskID'))->get();

$response=[
    'message:'=>'ok',
    'data'=> $data,
    'code' => '201'
];

    return  response($response, 201);
}

public function viewrunnerprofile(Request $request){
   $runner_profile= User::where('id', '=', $request->get('Runner_ID'))->get();
   return response()->json(['data'=>$runner_profile],201);

}

public function beginerrandz(Request $request){
    
    // $errandid=$request->get('taskID');
    // $runnerid=$request->get('runnerID');
    // $erranderID=$request->get('erranderID');
    // if(ApprovedErrandz::where('Task_ID','=',$errandid)
    // ->where('Runner_ID','=',$runnerid)
    // ->where('Errander_ID','=',$erranderID)
    // ->first()){ return response(['message'=>'Already approved this job',200]);}

    $array = [
        'Task_ID'=>$request->get('taskID'),
        'Runner_ID'=>$request->get('runnerID'),
        'Errander_ID'=>$request->get('erranderID'),
        'Status'=>$request->get('status'),
        'Runner_reply'=>$request->get('runnerReply'),
      ];

      ApprovedErrandz::updateOrCreate($array);



 $ubutumwa = [
    'Sender_ID'=>$request->get('erranderID'),
    'Receiver_ID'=>$request->get('runnerID'),
    'Sender_status'=>$request->get('senderstatus'),
    'Receiver_status'=>$request->get('receiverstatus'),
    'message'=>$request->get('ubutumwa'), ];
    Message::updateOrCreate($ubutumwa);

return response()->json(['message'=>'success'],201);
}



}
