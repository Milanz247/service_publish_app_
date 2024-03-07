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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('job_subcategory_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('service_user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('urgent_job')->nullable();
            $table->string('schedule_date')->nullable();
            $table->string('budget')->nullable();
            $table->string('status')->nullable();
            $table->string('schedule_job')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
