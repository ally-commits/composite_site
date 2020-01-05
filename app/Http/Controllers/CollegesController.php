<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CollegesController extends Controller
{
    public function index() {
        $data = DB::table('colleges')->get();

        return view('admin.collegeDetails')->with('colleges',$data);
    }
    public function collegeView($college_id) {
        $data = DB::table('participants')
            ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
            ->join('events', 'participants.event_id', '=', 'events.event_id')
            ->select('participants.*', 'colleges.*','events.*')
            ->where('participants.college_id', '=', $college_id)
            ->get();
        
        return view('admin.collegeView')->with('data' , $data);   
    }
}
