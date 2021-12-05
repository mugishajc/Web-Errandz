<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $users=  DB::table('onlinestatus')
        ->join('users','users.id','=','onlinestatus.user_id')
        ->select('users.firstname','users.lastname','onlinestatus.status','onlinestatus.last_login')
        ->get();

   // $users = DB::table('onlinestatus')->get();

    return view('Backend.main-dashboard.dashboard', ['users' => $users]);
    }
}
