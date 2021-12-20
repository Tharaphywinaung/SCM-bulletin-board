<!DOCTYPE html>
<html lang="en">
<head>
  <title>SCM Bulletin Borad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/custom.js') }}" ></script>
</head>
<body>
  <div id="window" class="shadow mx-auto">
    <nav class="navbar navbar-expand-md navbar-dark bg-info">
      <h2 class="logo">
        <a href="/">SCM Bulletin Board</a>
      </h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          @if (Auth::user())
          @if (Auth::user()->type == 0)
          <li class="nav-item active">
            <a href="{{ url('/users') }}">Users</a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('/posts') }}">Posts</a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.show',Auth::user()->id)}}" class="user-name">{{ Auth::user()->name }}</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.logout') }}" class="btn-logout">Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ url('/user/login') }}" class="btn-logout">Login</a>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </div>
  @yield('content')
  <footer class="navbar navbar-expand-md bg-info shadow">
    <div class="col-md-6">
      <p>Seattle Consulting Myanmar</p>
    </div>
    <div class="col-md-6">
      <p class="text-right">©copyright</p>
    </div>
  </footer>
</body>