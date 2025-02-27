<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddPrivacyTermsToSettingsTable extends Migration{
  public function up(){
    Schema::table('settings', function (Blueprint $table) {
      $table->tinyInteger('is_privacy_trams')->nullable()->default(1);
      $table->string('policy_link')->nullable()->default('#');
      $table->string('terms_link')->nullable()->default('#');
    });
  }
  public function down(){
    Schema::table('settings', function (Blueprint $table) {
      //
    });
  }
}