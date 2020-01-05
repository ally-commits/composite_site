@extends('layouts.admin-app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css') }}">
@endsection
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
            </div> 

            <div class="pt-1"> 
                <ul class="nav nav-tabs nav-iconfall nav-top-border no-hover-bg nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" id="activeOnlyIcon1-tab1" data-toggle="tab" href="#activeOnlyIcon1" aria-controls="activeOnlyIcon1" aria-expanded="true"><i class="ft-disc"></i> View Team Names</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkOnlyIcon1-tab1" data-toggle="tab" href="#linkOnlyIcon1" aria-controls="linkOnlyIcon1" aria-expanded="false"><i class="ft-plus"></i> Add Team Names</a>
                    </li> 
                </ul>
                <hr/>
                <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="activeOnlyIcon1" aria-labelledby="activeOnlyIcon1-tab1" aria-expanded="true">
                        <table class="table table-striped table-bordered zero-configuration dataTable">
                            <thead>
                                <tr role="row">
                                    <th>Sl No</th>
                                    <th>Team Name</th>
                                    <th>Assigned</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($codenames as $key => $codename)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $codename->name }}</td>
                                        <td>
                                            @if($codename->active == 1)
                                                <span class="text-danger"><i class="ft-x text-danger"></i>  Not Assigned  </span>
                                            @else
                                                <span class="text-success"><i class="ft-check text-success"></i>  Assigned</span>
                                            @endif
                                        </td> 
                                        <td>
                                            @if($codename->active == 1)
                                                <a href="removeCodeName/{{ $codename->code_id }}" class="btn btn-danger"><i class="ft-trash-2"></i> Delete</a> </td>
                                            @else
                                                <a href="removeCodeName/{{ $codename->code_id }}" class="btn btn-danger disabled"><i class="ft-trash-2"></i> Delete</a> </td>
                                            @endif
                                        
                                    </tr>
                                @endforeach 
                            </tbody>
                    </table>
                    </div>
                    <div class="tab-pane" id="linkOnlyIcon1" role="tabpanel" aria-labelledby="linkOnlyIcon1-tab1" aria-expanded="false">
                        <div class="form">
                            <form method="POST" action="{{ route('admin.addCodeName') }}"> 
                            @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Team Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" 
                                        class="form-control @error('name') is-invalid @enderror" name="name" 
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="ft-plus"></i>  {{ __('Add Team Name') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            
            <hr/>
        </div>  
    </div>
</div> 
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
@endsection