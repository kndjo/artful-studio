@extends('layout.main')

@section('title','Client Details')

@section('content')



<ul>
    <li>ID: {{ $client->id }}</li>
    <li>Username: {{ $client->username }}</li>
    <li>Firstname: {{ $client->firstname }}</li>
    <li>Lastname: {{ $client->lastname }}</li>
    @if ($client->image)
        <li>Image: <img src="{{ $client->getImageURL() }}" alt="Client Image" width="100"></li>
    @endif
    <li>Phonenumber: {{ $client->phonenumber }}</li>
    <li>Gender: {{ $client->gender }}</li>
    <li>Email: {{ $client->email }}</li>
</ul>


<a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Edit Client</a>
<form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete   
 Client</button>
</form>
@endsection