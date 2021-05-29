<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Changed Laravel to DCRSMS --> 
    <title>{{ config('app.name', 'DCRSMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Added style --> 
    <style>
        button{
			background-color: black; 
			border: none; 
			color: white; 
			padding: 5px 10px;
		}
        /* register.blade.php */ 
		table {
			width: 100%;
		}
        /* CustRegistration.blade.php & RiderRegistration.blade.php */ 
        table, td{
			padding: 10px;
		}
        /* RiderRegistration.blade.php - CHOOSE FILE */
		::-webkit-file-upload-button {
  			background: black;
  			color: white;
  			border: none;
  			padding: 5px 10px;
            text-transform: uppercase;
		}
        .center {
            margin: auto;
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" style="background-color: orange">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- Changed from Laravel to logo --> 
                    <img src="/images/Logo.png" alt="Dercs Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Changed mr to ml --> 
                    <ul class="navbar-nav ml-auto">
                        <!-- Added center header --> 
                        <center><p style="font-size:30px">REPAIR | SUPPLY | SERVICES</p></center>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @foreach($data1 as $row)
                                    {{ $row->Rider_Name }}
                                @endforeach
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @include('layouts.footer')
        </main>
    </div>
</body>
</html>
