<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class SetItemTypeToItemsTable extends Migration{
  public function up(){
    Schema::table('items', function (Blueprint $table) {
      $table->string('item_type')->nullable()->default('normal');
    });
  }
  public function down(){
    Schema::table('item', function (Blueprint $table) {
      //
    });
  }
}