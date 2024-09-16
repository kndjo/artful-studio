@extends('layout.main')

@section('title', 'Appointments')

@section('content')

<table class="table">

<thead>
    <tr>
        <th>Appointment ID</th>
        <th> Name</th>
        <th> PhoneNumber</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Action</th>

    </tr>
    <tbody>
        @foreach($apts as $apt)
        <tr>
        <th scope="row">{{$apt->id}}</th>
            <td>{{$apt->client->firstname}} {{$apt->client->lastname}}</td>
            <td>{{$apt->client->phonenumber}} </td>
            <td>{{$apt->date}}</td>
            <td>{{$apt->time}}</td>
            <td>{{$apt->Status}}</td>
            <td>
                <a href="{{route('apts.show',$apt->id)}}" class="btn btn-outline-primary">View</a>
                <a href="{{route('apts.edit',$apt->id}}"class="btn btn-outline-secondary">/a>
                <!-- <x-deletebutton :action="route('apts.destroy',$apt->id)"/> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</thead>

</table>

@endsection