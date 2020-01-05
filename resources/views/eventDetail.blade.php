@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-content-menu.css') }}">
@endsection

@section('content')
    <div class="container card p-2 m-auto">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 d-flex" style="justify-content: center;">
                <img src="{{ asset('img/'.$teams['0']->event_id .'.png') }}" style="width: 150px; height: 150px;">
            </div>
            <div class="d-flex" style="flex-direction: column; justify-content: center;">
                <h5 class="p-0 m-1"><b>Event Name:</b>{{ $teams['0']->event_name }}</h5>
                <h5 class="p-0 m-1"><b>Description: </b>{{ $teams['0']->title }}</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($teams as $team) 
                <div  class="col-sm-12 col-md-4 col-lg-3 my-1">
                    <div class="p-1 shadow br-2 bg-darky text-white d-flex"  style="flex-direction: row;align-items: center">
                        <span class="ft-user "></span>
                        <h5 class="p-0 m-0 px-1 text-white" style="flex: 1">{{ $team->college_code }}</h5>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
@endsection