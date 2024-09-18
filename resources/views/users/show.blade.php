@extends('layout.main')

@section('title', 'User Details')

@section('content')
<ul>
    <li>ID: {{ $user->id }}</li>
    <li>Username: {{ $user->username }}</li>
    <li>Firstname: {{ $user->firstname }}</li>
    <li>Lastname: {{ $user->lastname }}</li>
    <li>Email: {{ $user->email }}</li>
    <li>Role: {{ $user->role }}</li>
</ul>

<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>

<form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete User</button>
</form>
@endsection
