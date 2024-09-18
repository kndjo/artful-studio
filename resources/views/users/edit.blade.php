
@extends('layout.main')

@section('title', 'Edit User Profile')

@section('content')
    @include('users.form', ['action' => route('users.update', $user->id), 'edit' => true])
@endsection
