<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAttributeOptionsTable extends Migration{
  public function up(){
    Schema::create('attribute_options', function (Blueprint $table) {
      $table->id();
      $table->integer('attribute_id')->nullable();
      $table->string('name')->nullable();
      $table->double('price')->default()->nullable();
      $table->string('keyword')->nullable();
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('attribute_options');
  }
}