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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('product_id', 4)->unique();
            $table->string('product_name', 30);
            $table->char('company_id', 3);
            $table->char('category_id', 2);
            $table->unsignedInteger('amount');
            $table->string('unit', 10);
            $table->unsignedDecimal('price', 10, 2);
            $table->foreign('company_id')->references('company_id')->on('suppliers');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
