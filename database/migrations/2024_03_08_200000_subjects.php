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
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('subject_id')->primary();
            $table->string('sub_code');
            $table->text('subject_name');
            $table->text('subject_desc');
            $table->text('sched_time');
            $table->integer('instructor_id');
            $table->timestamps();
    
            $table->foreign('instructor_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
