<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://img.freepik.com/free-vector/vintage-tattoo-studio-logo-with-rose-vector-illustration-black-white-flower-with-tape_74855-11255.jpg?t=st=1726398447~exp=1726402047~hmac=1e8af3462e5f82535dcf9737476355cc5af171e7313d72d3763ec68352a14119&w=740') no-repeat center center fixed;
            background-size: cover;
        }
        .bg-blur {
            background-color: rgba(255, 255, 255, 0.8); /* Light overlay for readability */
            backdrop-filter: blur(8px); /* Blurring effect */
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="bg-blur p-4">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <a class="navbar-brand" href="{{ route('homepage') }}">Homepage</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointments.index') }}">Appointments</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li> --}}
                </ul>
                <form class="d-flex" role="search" action="{{ route('auth.logout') }}" method="POST" >   @csrf

           
                    <button class="btn btn-outline-success" type="submit" >Logout</button>
                  </form>
            </div>
        </nav>

        <main class="container my-5">
            <h1 class="display-4 mb-4">Dashboard</h1>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Clients</h5>
                            <p class="card-text display-4">{{ $totalClients }}</p>
                            <a href="{{ route('clients.index') }}" class="btn btn-primary">View All Clients</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Appointments</h5>
                            <p class="card-text display-4">{{ $totalAppointments }}</p>
                            <a href="{{ route('appointments.index') }}" class="btn btn-primary">View All Appointments</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
