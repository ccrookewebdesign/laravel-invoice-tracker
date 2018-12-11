<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller {
    
  public function index() {
  
    $clients = Client::all();

    return view('clients.index', ['clients' => $clients]);

  }

  public function create() {
  
  }

  public function store(Request $request) {
  
  }

  public function edit(Client $client) {
  
    return view('clients.edit', ['client' => $client]);

  }

  public function update(Request $request, Client $client) {
      //
  }

  public function destroy(Client $client) {
    
  }

}
