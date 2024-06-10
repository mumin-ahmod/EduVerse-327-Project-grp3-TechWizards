<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('category_id'); // Add 'category_id' as a text column
            $table->text('level'); // Add 'level' as a text column
            $table->longText('trailer_link')->nullable(); // Add 'trailer_link' as a nullable long text column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
