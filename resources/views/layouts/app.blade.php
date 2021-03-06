<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        巴哈姆特
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav pull-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                    <!-- Left Side Of Navbar -->
                    <div class="d-flex justify-content-between">
                        <div>
                         <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('discussion.index')}}" class="nav-link">
                                    Discussions
                                </a>
                            </li>
                         </ul>
                        </div>
                        <div>
                            <ul class="nav navbar-nav">
                                @auth
                                  <li class="nav-item">
                                        <a href="{{route('users.notifications')}}" class="nav-link">
                                           <span class="badge badge-info">
                                               {{auth()->user()->unreadNotifications->count()}}
                                               Unread notifications
                                           </span>
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                     </ul>
                  </div>
                </div>
            </div>
        </nav>

        @if(!in_array(request()->path(), ['login', 'register', 'password/email', 'password/reset']))
          <main class="container py-4">
            <div class="row">
                <div class="col-xs-2 text-center">
                    @auth
                        <a href="{{route('discussion.create')}}" class="btn btn-info my-2">
                            Add Discussion
                        </a>
                    @else
                        <a href="{{route('login')}}" class="btn btn-info my-2">
                            Sign in to add discussion
                        </a>
                    @endauth
                    <div class="card">
                        <div class="card-header">
                            Channels
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($channels as $channel)
                                    <li class="list-group-item">
                                        <a href="{{route('discussion.index')}}?channel={{$channel->slug}}">
                                            {{$channel->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-10">
                    @yield('content')
                </div>
            </div>
         </main>
        @else
          <main class="py-4">
              @yield('content')
          </main>
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
