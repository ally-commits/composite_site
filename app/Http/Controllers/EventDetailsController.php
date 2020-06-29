<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EventDetailsController extends Controller
{
    public function index() {
        $data = DB::table('events') 
            ->get(); 
        return view('eventDetails')->with('events',$data);
    }

    public function event($id) {
        $data = DB::table('participants')
            ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
            ->join('events', 'participants.event_id', '=', 'events.event_id')
            ->select('colleges.*','events.*')
            ->where('participants.event_id', '=', $id)
            ->where('participants.active','=',true)
            ->get(); 
        // dd();
        return view('eventDetail')->with('teams',$data);
    }
}
