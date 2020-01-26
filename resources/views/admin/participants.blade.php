@extends('layouts.admin-app')

@section('css') 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection
@section('content')
<div class="content-body" style="height: auto;">
    <div class="card p-1">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10px;">Sl No</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-label="Position: activate to sort column ascending" style="width: 100px;">Participant Names</th>
                                
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-label="Office: activate to sort column ascending" style="width: 88px;">College Name</th>
                                
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-label="Age: activate to sort column ascending" style="width: 26px;">Team Name</th>
                                    
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-label="Start date: activate to sort column ascending" style="width: 74px;">Event Name</th>
                                
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                    aria-label="Start date: activate to sort column ascending" style="width: 30px;">Action</th>
                                     
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($participants) > 0) 
                                @foreach($participants as $key => $participant)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" r>{{ $key+1 }}</td>
                                        <td>{{ $participant->participant_names }}</td>
                                        <td>{{ $participant->college_name }}</td>
                                        <td>{{ $participant->college_code }}</td>
                                        <td>{{ $participant->event_name }}</td> 
                                        <td class="d-flex" style="align-items: center;">
                                            @if($participant->active)
                                                <i class="ft-sun text-success" style="margin-right: 4px;"></i>
                                            @else
                                                <i class="ft-sun text-danger" style="margin-right: 4px;"></i>
                                            @endif
                                            <span class="dropdown">
                                                <button id="{{ $participant->participant_id }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                <span aria-labelledby="btnSearchDrop10" class="dropdown-menu mt-1 dropdown-menu-right">
                                                    <a href="#" data-toggle="modal" data-target="#{{ $participant->participant_id }}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                    @if($participant->active) 
                                                        <a href="participants/del/{{ $participant->participant_id }}" class="dropdown-item"><i class="ft-x"></i> De-Activate</a>
                                                    @else
                                                        <a href="participants/add/{{ $participant->participant_id }}" class="dropdown-item"><i class="ft-plus"></i> Activate</a>
                                                    @endif
                                                </span>
                                            </span>
                                        </td>
                                    </tr>  
                                    <div class="modal fade text-left" id="{{ $participant->participant_id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $participant->participant_id }}" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="{{ $participant->participant_id }}">Participant Name</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('admin.updateParticipant') }}" > 
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">Particpant's Name</label>
                                                            <input type="text" name="participant_name" class="form-control" value="{{ $participant->participant_names }}">
                                                        </div>
                                                        <input type="hidden" name="participant_id" value="{{ $participant->participant_id }}" />
                                                        <hr />
                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                                    </form>
                                                </div> 
                                            </div> 
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="d-flex p-2" style="justify-content: center; align-items: center;height: 100vh;">
                                    <i class="ft-alert-triangle" style="font-size: 30px;"></i> <h2 class="m-0">  &nbsp;No Data Found</h2>
                                </div>
                            @endif
                        </tbody> 
                    </table>
                </div>
            </div>
             
        </div>
    </div>
</div>
@endsection