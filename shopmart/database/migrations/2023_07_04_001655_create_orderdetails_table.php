<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderdetails', function (Blueprint $table) {
                $table->id('order_id');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('product_id')->on('products');
                $table->string('orderqty');
                $table->string('price');
                $table->string('payment_id');
                $table->string('payment_status');
                $table->string('payment_request_id');
                $table->enum('status' , ["ordered" , "dispatched" , "in_transit" ,"delivered"])->default('ordered');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
