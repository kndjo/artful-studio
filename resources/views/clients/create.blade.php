@extends('layout.main')

@section('title','Create a new Client')

@section('content')
@include('clients.form',['action' => route('clients.store')])
@endsection