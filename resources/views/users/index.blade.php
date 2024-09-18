@extends('layout.main')

@section('title', 'User')

@section('content')

<h1>List of Users</h1>
<form class="row flex g-3 justify-content-center"  action="{{route('users.index')}}" method="GET" >
  <div class="col">
    <x-textfield value="" label="Search for client" name="search" type="text" placeholder="Enter name or email" />
  
    <button class="btn btn-success" type="submit">Search</button>
  </div>
  <div class="col">
    
  </div>
</form>



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
      <td>{{$user->firstname}}  {{$user->lastname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role}}</td>
      
      <td>
        @if(Auth::user()->role === 'super_admin')
        <a href="{{route('users.show', $user->id)}}" class="btn btn-outline-primary">View</a>
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-secondary">Edit</a>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>



@endsection
