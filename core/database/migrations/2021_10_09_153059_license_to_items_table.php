<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class LicenseToItemsTable extends Migration{
  public function up(){
    Schema::table('items', function (Blueprint $table) {
      $table->text('license_name')->nullable();
      $table->text('license_key')->nullable();
    });
  }
  public function down(){
    Schema::table('items', function (Blueprint $table) {
      //
    });
  }
}