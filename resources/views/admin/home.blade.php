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
                                        <h1 class="">14</h1>
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
                                    <h1 class="">127</h1>
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
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            
                            <div class="text-center rounded-right">
                                <img src="{{ asset('img/it_manager.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>IT Manager</h5>
                            <h5 class="text-bold-400 mb-0">14</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/quiz.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>IT Quiz</h5>
                            <h5 class="text-bold-400 mb-0">12</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/treasure_hunt.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Treasure Hunt</h5>
                            <h5 class="text-bold-400 mb-0">12</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/coding.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Coding</h5>
                            <h5 class="text-bold-400 mb-0">10</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/web_design.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Web Designing</h5>
                            <h5 class="text-bold-400 mb-0">14</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">

                            <div class="text-center rounded-right">
                                <img src="{{ asset('img/photography.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>PhotoGraphy</h5>
                            <h5 class="text-bold-400 mb-0">12</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/paper_presentation.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Paper Presentation</h5>
                            <h5 class="text-bold-400 mb-0">11</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-right">
                                <img src="{{ asset('img/mad_ad.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Mad Ad</h5>
                            <h5 class="text-bold-400 mb-0">8</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/cosplay.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>CosPlay</h5>
                            <h5 class="text-bold-400 mb-0">12</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">

                            <div class="text-center rounded-right">
                                <img src="{{ asset('img/gaming.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Gaming</h5>
                            <h5 class="text-bold-400 mb-0">9</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="text-center rounded-left">
                                <img src="{{ asset('img/vlog.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Vlog</h5>
                            <h5 class="text-bold-400 mb-0">10</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class=" text-center rounded-right">
                                <img src="{{ asset('img/videoediting.png') }}" class="p-0" style="width: 80px;">
                            </div>
                            <div class="p-1 media-body">
                            <h5>Video Editing</h5>
                            <h5 class="text-bold-400 mb-0">13</h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>      
        </section>
    </div>
@endsection