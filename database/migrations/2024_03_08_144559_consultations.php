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
        Schema::create('consulations', function (Blueprint $table) {
            $table->integer('consult_id')->autoIncrement();
            $table->integer('instructor_id');
            $table->integer('student_id');
            $table->text('remarks');
            $table->string('date_time');
            $table->timestamps();
    
            $table->foreign('instructor_id')->references('user_id')->on('users');
            $table->foreign('student_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulations');
    }
};
