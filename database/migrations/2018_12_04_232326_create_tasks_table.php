<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {
  
  public function up() {
    Schema::create('tasks', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('client_id')->index();
      $table->unsignedInteger('invoice_id')->index();
      $table->date('task_date')->default(Carbon::now());
      $table->text('task_notes');
      $table->unsignedInteger('hours')->default(0);
      $table->boolean('fixed_rate')->default(false);
      $table->boolean('billable')->default(true);
      $table->unsignedInteger('task_hour_rate')->default(0);
      $table->unsignedInteger('task_half_hour_rate')->default(0);
      $table->unsignedInteger('task_total')->default(0);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('tasks');
  }

}
