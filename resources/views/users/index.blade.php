@extends('layout.main')

@section('title', 'User')

@section('content')

<h1>List of Users</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
   
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->username}}</td>
      <td>{{$user->fullname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role}}</td>
      
      <td>
        <a href="{{route('users.show', $user->id)}}" class="btn btn-outline-primary">View</a>
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-secondary">Edit</a>
        <x-delete-button :action="route('users.destroy', $user->id)"  />
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-left">
  <a class="btn btn-primary mb-3" href="{{route('users.create')}}">Add User</a>
</div>

@endsection
