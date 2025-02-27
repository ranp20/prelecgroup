<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSubcategoriesTable extends Migration{
  public function up(){
    Schema::create('subcategories', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('slug')->nullable();
      $table->integer('category_id');
      $table->tinyInteger('status')->default(0)->nullable();
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('subcategories');
  }
}