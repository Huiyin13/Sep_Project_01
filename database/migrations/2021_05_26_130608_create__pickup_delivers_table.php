<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupDeliversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PickupDelivers', function (Blueprint $table) {
            $table->id('PickUpDeliver_ID')->startingValue(10000);
            $table->string('OrderID');
            $table->string('Customer_ID');
            $table->string('Status');
            $table->date('PickUp_Date');
            $table->string('PickUp_Time');
            $table->string('PickUp_Add');
            $table->date('Deliver_Date');
            $table->string('Deliver_Time');
            $table->string('Deliver_Add');
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
        Schema::dropIfExists('PickupDelivers');
    }
}
