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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">

                
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand"  href="{{ url('/') }}">{{ config('app.name', 'Pizzaval') }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item  ">
                           <a class="nav-link" href="{{ route('user.orders') }}">My Orders</a> 
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('user.orders.create') }}">Order Pizza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.orders') }}">Admin</a> 
                        </li>
                        @endauth

                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else 


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            
                            </div>
                         </li>


                         <li class="nav-item my-2 ">
                            @include('partials.notifications-dropdown') 
                          </li>
                        @endguest
                      </ul>
                       
                    </div>
                  </nav>


            </div>
        </nav>

        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('extra-js')
</body>
</html>