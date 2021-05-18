<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('Customer_ID');
            $table->string('Customer_Name');
            $table->string('Customer_IC');
            $table->string('Customer_Email')->unique();
            $table->string('Customer_Address');
            $table->string('Customer_Phone');
            $table->string('Customer_Password');
            $table->string('Customer_Status')->nullable();
            $table->string('Ban_Reason')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
