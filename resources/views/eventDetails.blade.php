@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex card-container card pt-0 mt-0 ">
            @foreach($events as $event)
                <a class="card-event" href="eventDetails/{{ $event->event_id }}">
                    <img src="{{ asset('img/'.$event->event_id .'.png') }}" class="card-img" />
                    <h5 class="text-white">{{ $event->event_name }}</h5>
                </a> 
            @endforeach
        </div>
    </div>
@endsection