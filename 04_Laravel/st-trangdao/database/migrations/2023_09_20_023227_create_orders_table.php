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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->char('employee_id');
            $table->timestamp('order_date');
            $table->timestamp('delivery_date');
            $table->timestamp('shipping_date');
            $table->string('destination', 80);
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
