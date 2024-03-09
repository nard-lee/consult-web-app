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
        Schema::create('conschedules', function (Blueprint $table) {
            $table->integer('consched_id')->autoIncrement();
            $table->string('date_time');
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
        Schema::dropIfExists('conschedule');
    }
};
