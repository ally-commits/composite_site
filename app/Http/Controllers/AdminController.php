<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use DB;
use Redirect;
use OneSignal;

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
    public function restartIndex() {
        return view('admin.restart');
    }
    public function restart(Request $request) {
        $request->validate([ 
            'password' => ['required', 'string', 'min:8']
        ]);

        $data = $request->all(); 
        DB::table("users")->delete();
        DB::table("participants")->delete();
        DB::table("events")->delete();
        DB::table("colleges")->delete();
        DB::table("code_names")->delete();
        $arr = [
            'it_manager' => 'IT Manager',
            'it_quiz' => 'IT Quiz',
            'coding' => 'Coding',
            'web_design' => 'Web Design',
            'treasure_hunt' => 'Treasure Hunt',
            'vlog' => 'Vlog',
            'paper_presentation' => 'Paper Presentation',
            'photography' => 'PhotoGraphy',
            'video_editing' => 'Video Editing',
            'gaming' => 'Gaming',
            'mad_ad' => 'Mad Ad',
            'cosplay' => 'CosPlay',
            'exhibition' => 'Exhibition'
        ];
        foreach($arr as $key => $value) {
            Event::create([
                'event_id' => $key,
                'event_name' => $value,
                'title' => 'Participant\'s for round 1'
            ]);
        }
        return Redirect::route('admin.home')->with('message', 'Website Restarted Succesfully');   
    }
    public function pushNotification(Request $request) {
        $request->validate([ 
            'text' => ['required', 'string'],
            'url' => ['required','string']
        ]);

        $data = $request->all(); 
        OneSignal::sendNotificationToAll($data['text'], $url = $data['url'], $data = null);

        return Redirect::route('admin.notification')->with('message', 'Push Notification Sent');   
    }


    public function del($id) {
        DB::table('participants')
            ->where('participant_id','=',$id)
            ->update(['active' => false]);
        
        return Redirect::route('admin.participants')->with('message', 'Succesfully Updated..');   
    }
    public function add($id) {
        DB::table('participants')
            ->where('participant_id','=',$id)
            ->update(['active' => true]);
        
        return Redirect::route('admin.participants')->with('message', 'Succesfully Updated..');   
    }
}

