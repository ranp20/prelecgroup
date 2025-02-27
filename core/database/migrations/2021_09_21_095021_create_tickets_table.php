<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTicketsTable extends Migration{
  public function up(){
    Schema::create('tickets', function (Blueprint $table) {
      $table->id();
      $table->string('subject')->nullable();
      $table->text('message')->nullable();
      $table->string('file')->nullable();
      $table->integer('user_id')->nullable();
      $table->string('status')->default('Pending')->nullable();
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('tickets');
  }
}