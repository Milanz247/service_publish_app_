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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('dob')->nullable();
            $table->text('description')->nullable();
            $table->json('skill_categories')->nullable();
            $table->json('languages')->nullable();
            $table->string('location')->nullable();
            $table->string('pay_rate')->nullable();
            $table->string('availability')->nullable();
            $table->string('phone')->nullable();
            $table->string('member_since')->nullable();
            $table->string('last_active')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
