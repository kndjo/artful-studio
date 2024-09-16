@extends('layout.main')

@section('title','Clients Directory')


@section('content')


<form class="row flex g-3 justify-content-center"  action="{{route('clients.index')}}" method="GET" >
  <div class="col">
    <x-textfield value="" label="Search for client" name="search" type="text" placeholder="Enter name or email" />
  
    <button class="btn btn-success" type="submit">Search</button>
  </div>
  <div class="col">
    
  </div>
</form>

<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">Client ID</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $client)
      <tr>
        <th scope="row"> {{ $client->id }} </th>
        <td>{{ $client->firstname }}</td>
        <td>{{ $client->lastname }}</td>
        <td>{{ $client->email }}</td>
       

       
       
        <td>
            <a href="{{route('clients.show', $client->id)}}" class="btn btn-outline-primary">View</a>
            <a href="{{route('clients.edit', $client->id)}}" class="btn btn-outline-success">Edit</a>
            <x-deletebutton :action="route('clients.destroy', $client->id)"  />
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>

  <div class="d-flex justify-content-center">
  <a class="btn btn-lg btn-primary mb-3" href="{{route('clients.create')}}" >Add New Client</a>
</div> 



@endsection