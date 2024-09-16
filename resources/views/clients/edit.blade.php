@extends('layout.main')

@section('title','Edit Client Profile')

@section('content')

@include('clients.form',['action'=>route('clients.update',$client->id),'edit'=>true])
@endsection