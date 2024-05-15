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
        Schema::create('trade_license_details', function (Blueprint $table) {
            $table->id();
            $table->string('trade_name');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->bigInteger('phone_number')->unique();
            $table->integer('constituency_id');
            $table->integer('block_id');
            $table->integer('panchayat_id');
            $table->integer('license_type');
            $table->string('nature_of_trade');
            $table->integer('annual_income');
            $table->string('aadhaar_no');
            $table->string('pan_no');
            $table->string('identity_proof');
            $table->string('address_proof');
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
        Schema::dropIfExists('trade_license_details');
    }
};
