<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name');
            $table->string('course_image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('teacher_id');
            $table->date('start_date');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('teacher_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
