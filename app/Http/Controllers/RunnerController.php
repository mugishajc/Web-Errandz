<?php

namespace App\Http\Controllers;
use App\Models\ApprovedErrandz;
use App\Models\Task;
use App\Models\JobRequest;
use Illuminate\Http\Request;
use App\Models\CompletedJob;
class RunnerController extends Controller
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

    public function viewmyapproved_jobs(Request $request){

        $donee=ApprovedErrandz::with(['runner','errander','errandz'])
    ->where('Runner_ID', '=', $request->get('runner_id'))
    ->where('Status','!=','completed')
    ->get();

    return response()->json(['message'=>'ok','data'=>$donee ->makeHidden('Errander_ID')],201);
    }

public function runnerbegun_job(Request $request){

   ApprovedErrandz::where('Task_ID', '=', $request->get('jobid'))
    ->where('Runner_ID', '=', $request->get('runnerid'))
    ->where('Errander_ID', '=', $request->get('erranderid'))    
    ->update(['Runner_Reply' => $request->get('runner_reply'),
             'Status'=>$request->get('status')
]);

    return response()->json(['message'=>'success'],201);
}

public function end_job(Request $request){

    ApprovedErrandz::where('id', '=', $request->get('id')) 
    ->update(['Runner_Reply' => $request->get('runner_reply'),
             'Status'=>$request->get('status')
]);

Task::where('id', '=', $request->get('task_id')) 
->where('user_id', '=', $request->get('errander_id'))
->update(['status_id'=>$request->get('status')]);
   
JobRequest::where('taskID', '=', $request->get('task_id')) 
->where('runnerID', '=', $request->get('runner_id')) 
->update(['job_requests_status'=>$request->get('status')]);

$array = [
    'Task_ID'=>$request->get('task_id'),
    'Runner_ID'=>$request->get('runner_id'),
    'Errander_ID'=>$request->get('errander_id'),
    'Status'=>$request->get('status'),
    'Runner_Reply'=>$request->get('runner_reply'),
    'Errander_Reply'=>$request->get('errander_reply'),
    'payment_status'=>$request->get('payment_status'),
    'description'=>$request->get('description'),
    'photo_url1'=>$request->get('photo_url1'),
    'photo_url2'=>$request->get('photo_url2'),
    'photo_url3'=>$request->get('photo_url3'),
  ];

  CompletedJob::updateOrCreate($array);

return response()->json(['message'=>'success'],201);

}


}
