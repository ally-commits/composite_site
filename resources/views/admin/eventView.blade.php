@extends('layouts.empty')
@section('content')
@if(count($data) > 0) 
<div class="d-flex p-2 " style="justify-content: space-between;">
    <h4><b>Event Name:</b> {{ $data[0]->event_name }} </h4>
    <a class="btn btn-primary text-white" href="{{ route('admin.collegeDetails') }}"><i class="ft-arrow-left"> </i></a>
</div>
<table class="table table-striped table-bordered zero-configuration dataTable">
    <thead>
        <tr role="row">
            <th>Sl No</th>
            <th>College Id</th>   
            <th>Participant Names</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->college_code }}</td> 
                <td>{{ $value->participant_names }}</td> 
            </tr>
        @endforeach 
    </tbody>
</table>
@else
<div class="d-flex p-2" style="justify-content: center; align-items: center;height: 100vh;">
    <i class="ft-alert-triangle" style="font-size: 30px;"></i> <h2 class="m-0">  &nbsp;No Data Found</h2>
</div>
@endif

@endsection