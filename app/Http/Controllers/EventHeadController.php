<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventHeadController extends Controller
{
    
    public function addEventHeads()
    { 
        return view('admin.addEventHeads');
    }
    public function viewEventHeads() {
        $users = User::all();
        return view('admin.viewEventHeads')->with('users', $users);
    } 
    
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'event_id' => ['required', 'string', 'min:4',],
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'event_id' => $data['event_id'],
        ]);
        // Session::flash('message','Event Head Added Succesfully');
        return Redirect::route('admin.viewEventHeads')->with('message', 'Event Head Added Succesfully');

    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        
        return Redirect::route('admin.viewEventHeads')->with('message', 'Event Head Removed Succesfully');   
    }
}
