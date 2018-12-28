@extends('layouts.app')

@section('content')
  <h2>New Client</h2>
  <div class="flex">
    <div class="w-1/2">
      <form action="{{ route('clients.update', $client) }}" method="POST">
      @method('PATCH')
      @csrf
      <div class="mb-3">
        <input type="text"
          name="client_name"
          placeholder="Client Name*"
          value="{{ old('client_name', $client->client_name) }}"
          class="{{ $errors->has('client_name') ? 'input-error' : ''}}">
      </div>
      <div class="mb-3">
        <input type="text"
          name="short_name"
          placeholder="Client Short Name*"
          value="{{ old('short_name', $client->short_name) }}"
          class="{{ $errors->has('short_name') ? 'input-error' : ''}}">
      </div>
      <div class="mb-3">
        <input type="text" name="address_1" placeholder="Address" value="{{ old('address_1', $client->address_1) }}">
      </div>
      <div class="mb-3">
        <input type="text" name="address_2" value="{{ old('address_2', $client->address_2) }}">
      </div>
      <div class="mb-3">
        <input type="text" name="city" placeholder="City"  value="{{ old('city', $client->city) }}">
      </div>
      <div class="mb-3 flex">
        <div class="w-1/2 pr-1">
          <input type="text" name="state" placeholder="State"  value="{{ old('state', $client->state) }}">
        </div>
        <div class="w-1/2 pl-1">
          <input type="text" name="country" placeholder="Country" value="{{ old('country', $client->country) }}">
        </div>
      </div>
      <div class="mb-3 flex">
        <div class="w-1/2 pr-1">
          <input type="text"
            name="contact"
            placeholder="Contact*"
            value="{{ old('contact', $client->contact) }}"
            class="{{ $errors->has('contact') ? 'input-error' : ''}}">
        </div>
        <div class="w-1/2 pl-1">
          <input type="email"
            name="email"
            placeholder="Email*"
            value="{{ old('email', $client->email) }}"
            class="{{ $errors->has('email') ? 'input-error' : ''}}">
        </div>
      </div>
      <div class="mb-3 flex">
        <div class="w-1/2 pr-1">
          <input type="text"
            name="phone"
            placeholder="Phone*"
            value="{{ old('phone', $client->phone) }}"
            class="{{ $errors->has('phone') ? 'input-error' : ''}}">
        </div>
        <div class="w-1/2 pl-1">
          <input type="text"
            name="website"
            placeholder="Website*"
            value="{{ old('website', $client->website) }}"
            class="{{ $errors->has('website') ? 'input-error' : ''}}">
        </div>
      </div>
      <div class="mb-3 flex">
        <div class="w-1/2 pr-1">
          <input type="text" 
            name="hour_rate"
            placeholder="Hour Rate*"
            value="{{ old('hour_rate', $client->hour_rate) }}"
            class="{{ $errors->has('hour_rate') ? 'input-error' : ''}}">
        </div>
        <div class="w-1/2 pl-1">
          <input type="text"
            name="half_hour_rate"
            placeholder="Half Hour Rate*"
            value="{{ old('half_hour_rate', $client->half_hour_rate) }}"
            class="{{ $errors->has('half_hour_rate') ? 'input-error' : ''}}">
        </div>
      </div>
      <div class="mb-3 flex justify-between items-center">
        <div>
          <input type="checkbox" value="1" name="active" @if(old('agreement', $client->active)) checked @endif>
          <label for="active">Client is active</label>
        </div>
        <div>
          <input type="submit" value="Save" class="btn-primary">
        </div>
      </div>
      </form>
    </div>
    <div class="w-1/2 ml-6">
      @if ($errors->any())
        <div class="error">
          <h3 class="mb-4">Please fill in all required fields</h3>
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif
    </div>
  </div>
@endsection
