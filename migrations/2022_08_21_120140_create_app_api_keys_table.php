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
        Schema::create('app_api_keys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->references('id')->on('app_api_providers');
            $table->string('provider_api_key', 1050);
            $table->string('provider_api_secret', 1050)->nullable();
            $table->longText('provider_public_key', 10500)->nullable();
            $table->longText('provider_private_key', 10500)->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('last_updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('app_api_keys');
    }
};
