<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateChieldCategoriesTable extends Migration{
  public function up(){
    Schema::create('chield_categories', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('slug')->nullable();
      $table->integer('category_id');
      $table->integer('subcategory_id');
      $table->tinyInteger('status')->default()->nullable();
      $table->timestamps();
    });
  }
  public function down(){
    Schema::dropIfExists('chield_categories');
  }
}