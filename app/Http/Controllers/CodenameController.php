<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CodeName;
use Redirect;
use DB;
class CodenameController extends Controller
{
    public function index() {
        $codenames = DB::table("code_names")->get();
        return view('admin.codeNames')->with('codenames',$codenames);
    }
    public function add(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255','min:5']
        ]);

        $data = $request->all(); 

        CodeName::create([
            'code_id' => uniqid(),
            'name' => $data['name'], 
            'active' => true
        ]);  
        return Redirect::route('admin.codeNames')->with('message', 'Team Name Added Succesfully');
    }
    public function delete($id) {
        $team = CodeName::find($id);
        $team->delete();
        
        return Redirect::route('admin.codeNames')->with('message', 'Team Name Removed Succesfully');   
    }
}
