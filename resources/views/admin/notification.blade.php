@extends('layouts.admin-app')

@section('content')
<div class="content-body" style="height: auto;">  
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-content">
                    <div class="card-title text-center pt-2">
                        <h4>Send Push Notification</h4>
                    </div>
                    <div class="card-body"> 
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="timesheetinput1">Push Notification Title</label>
                                    <div class="col-md-9">
                                        <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput1" class="form-control" placeholder="Title" name="title">
                                        <div class="form-control-position">
                                            <i class="ft-edit"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="timesheetinput2">Push Notification link</label>
                                    <div class="col-md-9">
                                        <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput2" class="form-control" placeholder="Link" name="link">
                                        <div class="form-control-position">
                                            <i class="ft-globe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>  


                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="timesheetinput3">Push Notification Content</label>
                                    <div class="col-md-9">
                                        <div class="position-relative has-icon-left">
                                        <input name="content" class="form-control" rows="5" placeholder="Enter Content here" value="">
                                        <div class="form-control-position">
                                            <i class="ft-edit"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="form-actions right"> 
                                <button type="submit" class="btn btn-block btn-primary">
                                    <i class="la la-send"></i> Send Push Notification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
</div>
@endsection