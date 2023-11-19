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
        if (!Schema::hasTable('orderdetails')) {
            Schema::table('orderdetails', function($table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderdetails', function($table) {
            if (Schema::hasColumn('orderdetails', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
