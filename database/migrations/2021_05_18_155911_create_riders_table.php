<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->increments('Rider_ID');
            $table->string('Rider_Name');
            $table->string('Rider_IC');
            $table->string('Rider_Email')->unique();
            $table->string('Rider_Address');
            $table->string('Rider_Phone');
            $table->string('Rider_IC_Photo')->nullable();
            $table->string('Rider_Licence')->nullable();
            $table->string('Rider_Password');
            $table->string('Rider_Status')->nullable();
            $table->string('Reason')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('riders');
    }
}
