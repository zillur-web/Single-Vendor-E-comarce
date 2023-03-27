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
        Schema::create('oder_summeries', function (Blueprint $table) {
            $table->id();
            $table->integer('billing_details_id');
            $table->string('coupon')->nullable();
            $table->string('total');
            $table->string('discount');
            $table->string('subtotal');
            $table->string('delivery_charge');
            $table->integer('payment_status')->default(1)->comment('1=unpaid, 2=paid');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oder_summeries');
    }
};
