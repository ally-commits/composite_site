@extends('layouts.empty')
@section('content')
<div class="d-flex p-2 " style="justify-content: space-between;">
    <h4><b>College Name:</b> {{ $data[0]->college_name }} </h4>
    <a class="btn btn-primary text-white" href="{{ route('admin.collegeDetails') }}"><i class="ft-arrow-left"> </i></a>
</div>
<table class="table table-striped table-bordered zero-configuration dataTable">
    <thead>
        <tr role="row">
            <th>Sl No</th>
            <th>Event Id</th>
            <th>Event Name</th>  
            <th>Participant Names</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->event_id }}</td>
                <td>{{ $value->event_name }}</td> 
                <td>{{ $value->participant_names }}</td> 
            </tr>
        @endforeach 
    </tbody>
</table>

@endsection