@extends('layouts.admin-app')

@section('content')
    <div class="content-body" style="height: auto;">  
        <section id="minimal-gradient-statistics-bg"> 
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ft ft-users text-danger font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h1 class="">{{ $college }}</h1>
                                        <span>College Registred</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="ft ft-user text-info font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h1 class="">{{ $participants }}</h1>
                                    <span>Participant's</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card ">
                        <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="ft-bell text-success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h1>60</h1>
                                <span>Subscrition</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card ">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="ft-globe text-primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h1>423</h1>
                                        <span>Total Web Visits</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <section id="icon-section">
            <div class="row">
                <div class="col-12 mt-1 mb-1">
                <h4 class="text">Event Details</h4>
                <p>Number of Participant's based on Events</p>
                </div>
            </div>
            <div class="row">
                @foreach($events as $event)
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                            <div class="media align-items-stretch">
                                
                                <div class="text-center rounded-right">
                                    <img src="{{ asset('img/'. $event->event_id.'.png') }}" class="p-0" style="width: 80px;">
                                </div>
                                <div class="p-1 media-body">
                                <h5 class="text-uppercase">{{ $event->event_id}}</h5>
                                <h5 class="text-bold-400 mb-0">{{ $event->total }}</h5>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>      
        </section>
    </div>
@endsection