@extends('layouts.admin-app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css') }}">
@endsection


@section('content')
<div class="content-body" style="height: auto;"> 
    <div class="card">
        <div class="form-group p-2"> 
            <div class="d-flex">
                
                <h2 style="flex: 1">Event Head Details</h2>
                <a href="{{ route('admin.addEventHeads') }}" type="button" class="btn btn-primary bg-primary" style="border: none;">
                    <i class="ft-plus mr-1"></i>Add Event Head</a>
            </div>
            <hr>
            <!-- <button type="button" class="btn btn-lg btn-block btn-outline-success mb-2" id="type-success">Success</button> -->
            <table class="table table-striped table-bordered zero-configuration dataTable">
                <thead>
                    <tr role="row">
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Event</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name']}}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['event_id'] }}</td> 
                            <td>
                                <span class="dropdown">
                                    <button id="btnSearchDrop10" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                    <span aria-labelledby="btnSearchDrop10" class="dropdown-menu mt-1 dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                    <a href="removeEventHead/{{ $user->id }}" class="dropdown-item"><i class="ft-trash-2"></i> Delete</a> 
                                    </span>
                                </span>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>  
    </div>
</div> 
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
@endsection