<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Invoice Tracker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col">
  <header>
    <div class="container h-full flex items-center">
      <h2 class="mr-auto mt-3"><a href="{{ route('home') }}">Invoice Tracker</a></h2>
      @include('layouts.partials.nav')
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
      
      @if (flash_isset())
        <?php $flash_msg = get_flash_and_clear(); ?>
        <div class="flex alert {{ $flash_msg['type'] }}">
          {{ $flash_msg['message'] }}

          <button type="button" class="close ml-auto text-grey-lightest" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
      @endif

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