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
        if (!Schema::hasTable("orderdetails")) {
            Schema::create('orderdetails', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('invoice_id');
                $table->char('product_id', 4);
                $table->decimal('price', 10, 2);
                $table->integer('amount');
                $table->decimal('discount', 10, 2);
                $table->foreign('invoice_id')->references('id')->on('orders');
                $table->foreign('product_id')->references('product_id')->on('products');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
