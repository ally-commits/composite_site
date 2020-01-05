<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EventsController extends Controller
{
    public function index() {
        $data = DB::table('events')->get();

        return view('admin.eventDetails')->with('events',$data);
    }
    public function eventView($event_id) {
        $data = DB::table('participants')
            ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
            ->join('events', 'participants.event_id', '=', 'events.event_id')
            ->select('participants.*', 'colleges.*','events.*')
            ->where('participants.event_id', '=', $event_id)
            ->get();
        
        return view('admin.eventView')->with('data' , $data);   
    }
    
}
