<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\Participant;
use App\Event;
use DB;
class RegisterController extends Controller
{
    public function index() {
        return view('registration');
    }
    public function register(Request $request) {
        
        $data = $request->all();
        
        $codeName = DB::table('code_names')
            ->where('active','=',true)
            ->limit(1)
            ->get();

        $college_id = $codeName[0]->code_id;
        $college_code = $codeName[0]->name;

        $dump= DB::table('code_names')
                ->where('code_id','=',$college_id)
                ->update(['active' => false]);

        $college = College::create([
            'college_id' => $college_id,
            'college_code' => $college_code,
            'college_name' => $data['college'],
        ]);

        foreach($data['events'] as $key => $value) {
            Participant::create([
                'participant_id' => uniqid(),
                'participant_names' => $value['name'],
                'college_id' => $college_id,
                'event_id' => $key,
                'active' => true
            ]);
        }

        return $college_code;
    }
}
