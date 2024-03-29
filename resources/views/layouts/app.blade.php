<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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

        <main class="py-4">
              @if($errors->count() > 0)
                <ul class="list-group-item">
                  @foreach($errors->all() as $error)
                  <li class="list-group-item text-danger">
                    {{ $error }}
                  </li>
                  @endforeach
                </ul>
                <br />
              @endif
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <a href="{{ route('discussion.create') }}" class="form-control btn btn-primary">Create a new discussion</a>
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <a href="{{ route('forum') }}" style="text-decoration: none;">Home</a>
                        </li>
                        @if(Auth::id())
                        <li class="list-group-item">
                          <a href="{{ route('forum', ['filter' => 'me']) }}" style="text-decoration: none;">My discussions</a>
                        </li>
                        @endif
                        <li class="list-group-item">
                          <a href="{{ route('forum', ['filter' => 'solved']) }}" style="text-decoration: none;">Solved discussions</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('forum', ['filter' => 'unsolved']) }}" style="text-decoration: none;">Unsolved discussions</a>
                        </li>
                        @if(Auth::check())
                          @if(Auth::user()->admin)
                            <li class="list-group-item">
                              <a href="{{ route('channels.index') }}" style="text-decoration: none;">All channels</a>
                            </li>
                          @endif
                        @endif
                      </ul>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Channels
                    </div>
                    <div class="panel-body">
                      <ul class="list-group">
                        @foreach($channels as $channel)
                        <li class="list-group-item">
                          <a href="{{ route('channel', ['slug' => $channel->slug]) }}" style="text-decoration: none;">{{ $channel->title }}</a>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                  <div class="col-md-8">
                    @yield('content')
                </div>
              </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}')
      @endif
    </script>
</body>
</html>
