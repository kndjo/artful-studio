@extends('layout.main')

@section('title', 'Create a New Appointment')

@section('content')
    @include('appointments.form', ['action' => route('appointments.store'), 'clients' => $clients])
@endsection
