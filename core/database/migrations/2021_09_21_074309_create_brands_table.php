<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBrandsTable extends Migration{
  public function up(){
    Schema::create('brands', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('slug')->nullable();
      $table->string('photo')->nullable();
      $table->tinyInteger('status')->default()->nullable();
      $table->tinyInteger('is_popular')->default()->nullable();
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('brands');
  }
}