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
        if (!Schema::hasTable('customers')) {
            Schema::table('customers', function($table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('categories')) {
            Schema::table('categories', function($table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('employees')) {
            Schema::table('employees', function($table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('suppliers')) {
            Schema::table('suppliers', function($table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function($table) {
            if (Schema::hasColumn('customers', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        Schema::table('categories', function($table) {
            if (Schema::hasColumn('categories', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        Schema::table('employees', function($table) {
            if (Schema::hasColumn('employees', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        Schema::table('products', function($table) {
            if (Schema::hasColumn('products', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
