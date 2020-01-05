<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = DB::table('participants')->count();
        $college = DB::table('colleges')->count();
        $events = DB::table('participants')
                ->select('event_id', DB::raw('count(*) as total'))
                ->groupBy('event_id')
                ->get();

        return view('admin.home', compact(['participants','college','events']));
    }
    public function notification()
    {
        return view('admin.notification');
    }
    public function addEventHeads()
    {
        $users = User::all();
        return view('admin.addEventHeads')->with('users', $users);
    }
}

