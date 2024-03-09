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
        Schema::create('instructor_subjects', function (Blueprint $table) {
            $table->integer('instructor_id');
            $table->string('subject_id');
            $table->timestamps();
    
            $table->foreign('instructor_id')->references('user_id')->on('users');
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_subjects');
    }
};
