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
        Schema::create('appointments', function (Blueprint $table) {
            $table->integer('apt_id')->autoIncrement();
            $table->integer('student_id');
            $table->integer('instructor_id');
            $table->text('concern');
            $table->timestamps();
    
            $table->foreign('student_id')->references('user_id')->on('users');
            $table->foreign('instructor_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
