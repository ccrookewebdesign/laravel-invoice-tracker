<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientsController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }
  
  public function index() {

    $clients = Client::all();

    return view('clients.index', ['clients' => $clients]);

  }

  public function create() {
  
    return view('clients.create');

  }

  public function store(Request $request) {
  
    $data = $this->validateClient($request);

    $data['active'] = $request->has('active'); 

    Client::create($data);

    return redirect(route('clients.index'));//->flash("Affiliate added")

  }

  public function edit(Client $client) {
  
    return view('clients.edit', ['client' => $client]);

  }

  public function update(Request $request, Client $client) {
    
    $data = $this->validateClient($request, $client->id);
    
    $data['active'] = $request->has('active'); 

    $client->update($data);
    
    return redirect(route('clients.index'));//->flash("Affiliate added")

  }

  private function validateClient(Request $request, $clientId = 0) {
    
    $id = $clientId ? ',' . $clientId  : '';
    
    return $request->validate([
      'client_name' => 'required|min:5|unique:clients,client_name'.$id,
      'short_name' => 'required|min:2|unique:clients,short_name'.$id,
      'address_1' => 'nullable',
      'address_2' => 'nullable',
      'city' => 'nullable',
      'state' => 'nullable',
      'country' => 'nullable',
      'contact' => 'required|min:5',
      'email' => 'required|email',
      'phone' => 'required|min:10',
      'website' => 'required|min:7',
      'hour_rate' => 'required|numeric',
      'half_hour_rate' => 'required|numeric'
    ]);
      
  }

}
