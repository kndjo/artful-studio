@extends('layout.main')

@section('title', 'Edit Appointment')

@section('content')

    @include('appointments.form', [
        'action' => route('appointments.update', $appointment->id), 
        'edit' => true, 
        'appointment' => $appointment, 
        'clients' => $clients
    ])

@endsection
