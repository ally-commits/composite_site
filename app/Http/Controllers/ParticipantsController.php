<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ParticipantsController extends Controller
{
    protected $casts = [
        'participant_names' => 'array'
    ];
    public function index() {
        $data = DB::table('participants')
            ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
            ->join('events', 'participants.event_id', '=', 'events.event_id')
            ->select('participants.*', 'colleges.*','events.*')
            ->get();

        dd($data);
    }
}
