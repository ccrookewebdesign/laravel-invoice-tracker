<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
  
    $v = Validator::make($request->all(), []);

    $v = Client::validator($v);
    $data = $v->validate();

    $data['active'] = $request->has('active'); 

    Client::create($data);

    return redirect(route('clients.index'))->flash("Client added");

  }

  public function edit(Client $client) {
  
    return view('clients.edit', ['client' => $client]);

  }

  public function update(Request $request, Client $client) {
    
    $v = Validator::make($request->all(), []);

    $v = Client::validator($v, $client->id);
    $data = $v->validate();

    $data['active'] = $request->has('active'); 

    $client->update($data);

    return redirect(route('clients.index'))->flash("Client updated");

  }

}
