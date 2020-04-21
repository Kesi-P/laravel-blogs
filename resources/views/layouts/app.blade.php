<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sus') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Sus
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


    </div>

    <div class="container">
      <div class="row justify-content-md-center">
          @if(Auth::check())
        <div class="col-lg-4">

          <ul class="nav">
            <li class="nav-item">
              <a href="{{ route('category.create')}}" type="button" class="btn btn-outline-dark">Create New Category</a>
              <a href="{{ route('post.create')}}" type="button" class="btn btn-outline-dark">Create New Post</a>
              <a href="{{ route('tag.create')}}" type="button" class="btn btn-outline-dark">Create New Tag</a>
              @if(Auth::user()->admin)
              <a href="{{ route('user.create')}}" type="button" class="btn btn-outline-dark">Create New User</a>
              @endif
            </li>
          </ul>


          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ route('categories')}}">Category</a></li>
            <li class="list-group-item"><a href="{{ route('posts')}}">Post</a></li>
            <li class="list-group-item"><a href="{{ route('tags')}}">Tag</a></li>
            <li class="list-group-item"><a href="{{ route('users')}}">User</a></li>
            <li class="list-group-item"><a href="{{ route('post.trashed')}}">Trashed Post</a></li>

          </ul>
        </div>
          @endif
        <div class="col-lg-8">
          @yield('content')
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
     @if(Session::has('success'))
      toastr.success( "{{ Session::get('success') }}" )
     @endif
     @if(Session::has('info'))
      toastr.info( "{{ Session::get('info') }}" )
     @endif
    </script>
</body>
</html>
