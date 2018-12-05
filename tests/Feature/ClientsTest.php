<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsTest extends TestCase {
  
  /** @test */
  public function a_user_can_browse_clients() {
    
    $response = $this->get('/clients');

    $response->assertStatus(200);
  
  }

}
