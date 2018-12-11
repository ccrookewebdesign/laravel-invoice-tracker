<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsTest extends TestCase {

  use RefreshDatabase;

  /** @test */
  public function a_user_can_browse_clients() {
    
    $response = $this->get(route('clients'));

    $response->assertStatus(200)->assertViewHas('clients');
  
  }

  /** @test */
  public function a_user_can_view_a_client_details() {
    
    $client = create('App\Client');
    
    $response = $this->get(route('clients.edit', $client));

    $response->assertStatus(200)->assertViewHas('client');
  
  }

  /** @test */
  public function an_authenticated_user_can_create_a_client() {

    $client = make('App\Client');

    $this->post(route('client.save', $client->to_array()));

    $this->assertDatabaseHas()
  }

}
