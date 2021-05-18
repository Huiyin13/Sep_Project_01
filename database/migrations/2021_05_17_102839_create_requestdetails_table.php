<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestdetails', function (Blueprint $table) {
            $table->id('OrderID')->startingValue(10000);
            $table->string('Customer_ID');
            $table->string('Order_Status');
            $table->string('Comp_Owner');
            $table->string('Comp_Model');
            $table->date('Warranty_Date');
            $table->integer('Problems_Frequency');
            $table->string('Problems_Reported');
            $table->string('Reason');
            $table->float('Estimated_Cost');
            $table->string('Confirmation_Status');
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
        Schema::dropIfExists('requestdetails');
    }
}
