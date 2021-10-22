<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('home') }}">Home</a></li>
        @if(Session::has('admin'))
        <li><a href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
        <li>
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Manage Users
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('seekersList')}}">Job Seeker</a><br>
              <a class="dropdown-item" href="{{route('adminSignup')}}">Freelance Employer</a><br>
              <a class="dropdown-item" href="{{route('adminSignup')}}">Corporate Employer</a>
            </div>
          </div>
        </li>
        <li><a href="{{ route('dashboardAdmin') }}">Manage Jobs</a></li>
        <li><a href="{{ route('dashboardAdmin') }}">Manage Queries</a></li>
        @endif
        @if(Session::has('seeker') || !Session::has('admin'))
        <li><a href="{{ route('dashboardSeeker') }}">Dashboard</a></li>
        <li><a href="{{ route('contact') }}">Contact US</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Session::has('admin') || Session::has('seeker'))
        @if(Session::has('admin'))
        <li><a href="#">Welcome {{Session()->get('admin')}}</a></li>
        @endif
        @if(Session::has('seeker'))
        <li><a href="#">Welcome {{Session()->get('seeker')}}</a></li>
        @endif
        <li><a href="{{route('logout')}}" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @else
        {{-- <li class="nav-item dropdown"> --}}
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               SignUp
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('adminSignup')}}">Admin</a><br>
              <a class="dropdown-item" href="{{route('seekerSignup')}}">Job Seeker</a><br>
              <a class="dropdown-item" href="{{route('adminSignup')}}">Freelance Employer</a><br>
              <a class="dropdown-item" href="{{route('adminSignup')}}">Corporate Employer</a>
            </div>
          </div>
        {{-- </li> --}}

        
        <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @endif
      </ul>
    </div>
  </nav>