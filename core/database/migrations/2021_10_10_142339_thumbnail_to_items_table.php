<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class ThumbnailToItemsTable extends Migration{
  public function up(){
    Schema::table('items', function (Blueprint $table) {
      $table->string('thumbnail')->nullable();
    });
  }
  public function down(){
    Schema::table('items', function (Blueprint $table) {
      //
    });
  }
}