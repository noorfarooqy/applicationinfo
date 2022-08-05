<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_info', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_logo')->nullable();
            $table->string('app_logo_mobile')->nullable();
            $table->string('app_email')->nullable();
            $table->string('app_phone')->nullable();
            $table->string('app_developer')->default('Drongo Technology Limited');
            $table->string('app_address')->nullable();
            $table->string('app_locale')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_info');
    }
};
