@extends('layouts.app')

@section('css')
<style>
    .shadow {
        box-shadow: 1px 1px 5px rgb(143, 143, 143) !important;
        padding: 8px 15px;
        margin: 5px;
        border-radius: 2px;
    }
</style>
@endsection
@section('content')
<section class="w-100">
    <div class="row w-100 m-0">
        <div class="col-md-12 p-0 m-0">
            <h1 class="text-center">Event Head Dashboard</h1>
            <h4 class="text-center">{{ Auth::user()->event_id }}</h4>
            <hr>
        </div>
        <div class="card py-1 d-flex container">
            <div style="flex: 4">
                <h5>Enter the Title</h5>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Title Here" value="Participant's For First Round">
            </div>
            <hr>
            <span class="mb-1">Participant's List</span>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 1</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 2</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 3</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 4</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 5</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 6</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 7</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 8</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 9</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                        <span class="ft-user"></span>
                        <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 10</h5>
                        <span class="ft-x"></span>
                    </div>
                </div>
                
                <hr>
                
                <div class="col-sm-12 mt-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#large"><i class="ft-arrow-right"></i> Update</button>
                </div>
            </div> 
            <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Update Event Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="alert alert-warning alert-dismissible mb-1" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="alert-heading mb-1">Warning!</h4> 
                                    <p>Go through partcipant's list &amp; make sure your updating the proper data. Once the data is updated it cannot be changed . If the Participant's list need to be changed close the model and edit the list and update again</p>
                                </div>
                                <h4><b>Title:</b> Participant's Selected for Next Round</h4>
                                <hr>
                                <span class="mb-1">Participant's List</span>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 1</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 2</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 3</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 4</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 5</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 6</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 7</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 8</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 9</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <div class="p-1  shadow d-flex" style="flex-direction: row; align-items: center;">
                                            <span class="ft-user"></span>
                                            <h5 class="p-0 m-0 px-1" style="flex: 1">College Code 10</h5>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="col-sm-12 mt-2">
                                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="ft-x"></i> Close</button>
                                        <button class="btn btn-success" data-dismiss="modal" aria-label="Close"><i class="ft-arrow-right"></i> Update</button>
                                    </div>
                                </div>  
                            </div>  
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
