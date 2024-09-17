{{-- start nav --}}
   <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
    <img class="navbar-brand" src="https://img.freepik.com/free-vector/vintage-tattoo-studio-logo-with-rose-vector-illustration-black-white-flower-with-tape_74855-11255.jpg?t=st=1726398447~exp=1726402047~hmac=1e8af3462e5f82535dcf9737476355cc5af171e7313d72d3763ec68352a14119&w=740" alt="Artful Studio Logo" style="width: 25mm; height: 25mm;">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
         
          <a class="nav-link active" aria-current="page" href=" {{ route('homepage') }}">Dashboard</a>
          <a class="nav-link" href="{{route('appointments.index')}}">Appointments</a>
          <a class="nav-link" href="{{route('clients.index')}}">Clients</a>
       
          
         
         
          <form class="d-flex" role="search" action="{{ route('auth.logout') }}" method="POST" >   @csrf

           
            <button class="btn btn-outline-success" type="submit" >Logout</button>
          </form>
          
          
        </div>
      </div>
    </div>
  </nav>
{{-- end nav --}}