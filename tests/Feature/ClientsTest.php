<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

//use App\Client;

class ClientsTest extends TestCase {

  use RefreshDatabase;

  /** @test */
  public function a_user_can_browse_clients() {

    createAndLoginUser();
    
    $response = $this->get(route('clients.index'))->assertNoException();

    $response->assertStatus(200)->assertViewHas('clients');
  
  }

  /** @test */
  public function a_user_can_view_a_client_details() {
    
    createAndLoginUser();

    $client = create('App\Client');
    
    $response = $this->get(route('clients.edit', $client))->assertNoException();

    $response->assertStatus(200)->assertViewHas('client');
  
  }

  /** @test */
  public function an_authenticated_user_can_create_a_client() {

    createAndLoginUser();

    $client = make('App\Client');

    $response = $this->post(route('clients.store', $client->toArray()))->assertNoException();

    $response->assertRedirect(route('clients.index'));

    $this->assertDatabaseHas('clients', ['client_name' => $client->client_name]);

  }

  /** @test */
  public function an_authenticated_user_can_update_a_client() {

    createAndLoginUser();

    $client = create('App\Client');

    $data = [
      'client_name' => 'Updated Name',
    ];

    $response = $this->patch(route('clients.update', $client), array_merge($client->toArray(), $data))->assertNoException();;

    $response->assertRedirect(route('clients.index'));

    $this->assertDatabaseHas('clients', $data);

  }

}
