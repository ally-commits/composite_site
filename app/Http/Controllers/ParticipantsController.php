<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class ParticipantsController extends Controller
{
    protected $casts = [
        'participant_names' => 'array'
    ];
    public function index() {
        // $data = DB::table('participants')
        //     ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
        //     ->join('events', 'participants.event_id', '=', 'events.event_id')
        //     ->select('participants.*', 'colleges.*','events.*')
        //     ->where('participants.college_id', '=', '5e106406aad43')
        //     ->get();

        // dd($data);
        // dd();

        $events = DB::table('participants')
                ->select('event_id', DB::raw('count(*) as total'))
                ->groupBy('event_id')
                ->get();

        dd($data);
    }
    public function addEvent() {
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
            'cosplay' => 'CosPlay'
        ];
        foreach($arr as $key => $value) {
            Event::create([
                'event_id' => $key,
                'event_name' => $value,
                'title' => 'Participant\'s for round 1'
            ]);
        }
    }
    public function addAdmin() {
        Admin::create([
            'email' => 'admin',
            'password' => Hash::make('.pass.1234.'),
        ]);
    }
}
