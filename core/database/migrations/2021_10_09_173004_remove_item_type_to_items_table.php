<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class RemoveItemTypeToItemsTable extends Migration{
  public function up(){
    Schema::table('items', function (Blueprint $table) {
      $table->dropColumn('item_type');
    });
  }
  public function down(){
    Schema::table('item', function (Blueprint $table) {
      //
    });
  }
}