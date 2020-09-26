<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeform', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->boolean('prize_consent')->nullable();
            $table->string('shirt_size')->nullable();
            $table->string('address_country')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->integer('address_zip')->nullable();
            $table->string('school')->nullable();
            $table->string('school_level')->nullable();
            $table->string('primary_major')->nullable();
            $table->string('secondary_major')->nullable();
            $table->string('minor')->nullable();
            $table->year('graduation_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typeform');
    }
}
