<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {
  
  public function up() {
    Schema::create('clients', function (Blueprint $table) {
      $table->increments('id');
      $table->string('client_name')->unique();
      $table->string('short_name')->unique();
      $table->string('address_1')->nullable();
      $table->string('address_2')->nullable();
      $table->string('city')->nullable();
      $table->string('state')->nullable();
      $table->string('postal_code')->nullable();
      $table->string('country')->nullable();
      $table->string('contact');
      $table->string('email');
      $table->string('phone');
      $table->string('website')->unique();
      $table->boolean('active')->default(true);
      $table->unsignedInteger('hour_rate')->default(65);
      $table->unsignedInteger('half_hour_rate')->default(35);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('clients');
  }

}
