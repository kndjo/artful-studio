@extends('layout.main')

@section('title','Appointment Details')

@section('content')



<ul>
    <li>Appointment ID: {{ $appointment->id }}</li>
    <li>Time: {{ $appointment->time }}</li>
    <li>Date: {{ $appointment->date }}</li>
    <li>Client: {{ $appointment->client->firstname }} {{ $appointment->client->lastname }}</li>
    
    <li>Client Phonenumber: {{ $appointment->client->phonenumber }}</li>
    
    <li>Email: {{ $appointment->client->email }}</li>
    <li>Status: {{ $appointment->status }}</li>
</ul>


<a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">Edit Appointment</a>
@if(Auth::user()->role === 'super_admin')
<form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete   
 Appointment</button>
</form>
@endif
@endsection