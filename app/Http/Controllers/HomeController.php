<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use OneSignal;

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
        return view('eventHeadDashboard');
    }
    public function getData() {
        $user = auth()->user();
        $data = DB::table('participants')
            ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
            ->join('events', 'participants.event_id', '=', 'events.event_id')
            ->select('participants.*', 'colleges.*','events.*')
            ->where('participants.event_id', '=', $user->event_id)
            ->where('participants.active', '=', true)
            ->get();  
        
        return $data;
    }
    public function updateData(Request $request) {
        $data = $request->all();
        $user = auth()->user();

        $dump = DB::table('events')
            ->where('event_id','=',$user->event_id)
            ->update(['title' => $data['title']]);

        foreach($data['removedList'] as $id) {
            DB::table('participants')
                ->where('participant_id','=',$id)
                ->update(['active' => false]);
        }

        // dd($user);
        $text = $user->event_id . ":" . $data['title'];
        $url_content = 'http://localhost:8000/eventDetails/'. $user->event_id;
        OneSignal::sendNotificationToAll($text, $url = $url_content, $data = null);

        return "done";
    }
}
