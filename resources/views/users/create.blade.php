<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
@extends ('layout.main')

@section('title','Add New User')


@section('content')

<!-- <h1>Create Post</h1> -->
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include ('users.form',['action'=>route('users.store')])





@endsection