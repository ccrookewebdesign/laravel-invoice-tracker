@extends('layouts.app')

@section('content')
  <h2>Clients</h2>

  @foreach($clients as $client)
    <p><a href="{{route('clients.edit', $client)}}">{{ $client->client_name }}</a></p>
  @endforeach

@endsection
