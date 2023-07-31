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
        Schema::create('mobiledetails', function (Blueprint $table) {
            $table->id('mobiledetail_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->string('display');
            $table->string('in_the_box');
            $table->enum('ram' , ['1GB', '2GB', '4GB', '6GB', '8GB', '12GB', '16GB']);
            $table->enum('storage' , ['16GB', '32GB', '64GB', '128GB', '256GB', '512GB', '1TB']);
            $table->string('chipset');
            $table->string('primary_camera');
            $table->string('selfie_camera');
            $table->string('battery');  
            $table->string('warranty');  
            $table->string('operating_system');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiledetails');
    }
};
