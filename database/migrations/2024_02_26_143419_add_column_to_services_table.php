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
        Schema::table('services', function (Blueprint $table) {
            $table->integer('service_category_id')->nullable();
            $table->integer('service_subcategory_id')->nullable();
            $table->string('service_location')->nullable();
            $table->string('status')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('service_category_id');
            $table->dropColumn('service_subcategory_id');
            $table->dropColumn('service_location');
            $table->dropColumn('status');
            $table->dropColumn('phone');

        });
    }
};
