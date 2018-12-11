<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Invoice Tracker') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col">
  <header>
    <div class="container h-full flex items-center">
      <h2 class="mr-auto mt-2"><a href="index.cfm">Invoice Tracker</a></h2>
      <nav class="flex">
        @auth
          <div class="active">
            <a href="{{ route('home') }}">Home</a>
          </div>
          <div>
            <a href="{{ route('clients.index') }}">Clients</a>
          </div>
          <div>
            <a href="tasks.cfm">Tasks</a>
          </div>
          <div>
            <a href="invoices.cfm">Invoices</a>
          </div>
          <div>
            <a href="expenses.cfm">Expenses</a>
          </div>
          <div><a href="">Reports</a></div>
          <div>
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
          </div>
          
        @else
          <div><a href="">Login</a></div>
        @endauth
      </nav>
    </div>
  </header>
  <div id="subheader">
    <div class="container h-full flex items-center">
      <div class="ml-auto flex">
        <div class="mr-12">
          <a href="{{route('clients.create')}}">new client</a>
        </div>
        <div>
          {{ date('m/d/Y g:i A') }}
        </div>
      </div>
    </div>
  </div>
  <div class="flex-auto py-6">
    <div class="container"> 
      @yield('content')
    </div>  
  </div>
  <footer>
    <div class="container h-full pt-2">
      <span>&copy; 2018 chris crooke</span>
    </div>  
  </footer>
</body>
</html> 