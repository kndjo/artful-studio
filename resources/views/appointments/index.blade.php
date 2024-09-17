@extends('layout.main')

@section('title','Appointments' )

@section('content')
<div class="col">
  <form class="row flex g-3 justify-content-center" action="{{ route('appointments.index') }}" method="GET">
    <div class="col">
        <x-textfield value="" label="Search for appointment" name="search" type="text" placeholder="Enter name" />
    </div>
    <button class="btn btn-success" type="submit">Search</button>
</form>


  <div class="col">
<table class="table ">
    <thead>
        <tr>
            <th scope="col">Appointment ID</th>
         
            <th scope="col">Time</th>
            <th scope="col">Date</th>
            <th scope="col">Client</th>
            <th scope="col">Client Email</th>
            <th scope="col">Client Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    
        @foreach ($appointments as $appointment)
        <tr>
            <th scope="row"> {{ $appointment->id }}</td>
            <td>{{ $appointment->time }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->client->firstname }} {{ $appointment->client->lastname }}</td>
            <td>{{ $appointment->client->email }}</td>
            <td>{{ $appointment->client->phonenumber   
}}</td>
            <td>{{ $appointment->status }}</td>
            <td>
                <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-outline-primary">View</a>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-outline-success">Edit</a>
                <x-deletebutton :action="route('appointments.destroy', $appointment->id)" />
            </td>
        </tr>
    @endforeach
             
            
    </tbody>
</table>

<div class="d-flex justify-content-center">
<a class="btn btn-lg btn-primary mb-3" href="{{route('appointments.create')}}">Add New Appointment</a>
</div>

@endsection