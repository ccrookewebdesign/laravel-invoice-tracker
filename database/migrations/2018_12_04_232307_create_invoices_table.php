<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateInvoicesTable extends Migration {
    
  public function up() {
    Schema::create('invoices', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('client_id')->index();
      $table->string('title');
      $table->date('due_date')->default(Carbon::now());
      $table->date('sent_date')->nullable();
      $table->boolean('paid')->default(false);
      $table->date('paid_date')->nullable();
      $table->text('notes');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('invoices');
  }

}
