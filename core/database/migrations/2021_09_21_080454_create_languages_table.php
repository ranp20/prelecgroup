<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateLanguagesTable extends Migration{
  public function up(){
    Schema::create('languages', function (Blueprint $table) {
      $table->id();
      $table->string('language')->nullable();
      $table->string('file')->nullable();
      $table->string('name')->nullable();
      $table->tinyInteger('is_default')->default(0);
      $table->tinyInteger('rtl')->default(0);
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('languages');
  }
}