<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Redirect;

class ParticipantsController extends Controller
{
    public function index() {
        $data = DB::table('participants')
            ->join('colleges', 'participants.college_id', '=', 'colleges.college_id')
            ->join('events', 'participants.event_id', '=', 'events.event_id')
            ->select('participants.*', 'colleges.*','events.*') 
            ->get();   
        return view('admin.participants')->with('participants',$data);
    }
    public function addAdmin() {
        Admin::create([
            'email' => 'admin',
            'password' => Hash::make('.pass.1234.'),
        ]);
    }
    public function update(Request $request) {
        $data = $request->all();
        DB::table('participants')
            ->where('participant_id','=',$data['participant_id'])
            ->update(['participant_names' => $data['participant_name']]);

            return Redirect::route('admin.participants')->with('message', 'Participant Name Updated Succesfully');   
    }
}
