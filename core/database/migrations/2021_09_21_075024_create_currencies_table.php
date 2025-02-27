<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCurrenciesTable extends Migration{
  public function up(){
    Schema::create('currencies', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('sign')->nullable();
      $table->double('value')->nullable();
      $table->tinyInteger('is_default')->default()->nullable();
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('currencies');
  }
}