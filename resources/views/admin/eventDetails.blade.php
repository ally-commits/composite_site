@extends('layouts.admin-app')

@section('content')
<div class="content-body" style="height: auto;"> 
    <div class="card">
        <div class="form-group p-2"> 
            <div class="d-flex">
                @if(Session::has('message'))
                    <div id="toast-container" class="toast-container toast-top-right">
                        <div class="toast toast-success" aria-live="polite" style="anime-disappear">
                            <div class="toast-title">{{ Session::get('message') }}</div> 
                        </div>
                    </div>
                @endif
                <h2 style="flex: 1">Event Details</h2> 
            </div>
            <hr>
            <table class="table table-striped table-bordered zero-configuration dataTable">
                <thead>
                    <tr role="row">
                        <th>Sl No</th>
                        <th>Event ID</th>
                        <th colspan="3">Event Name</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $key => $event)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $event->event_id }}</td>
                            <td colspan="3">{{ $event->event_name}}</td> 
                            <td><a class="btn btn-primary text-white" href="eventDetails/{{ $event->event_id }}"><i class="ft-eye"></i> View</a></td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>  
    </div>
</div> 
@endsection