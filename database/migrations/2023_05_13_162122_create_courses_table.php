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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('description');
            $table->string('category');
            $table->string('course_image');
            $table->string('duration');
            $table->string('status');
            $table->string('type');
            $table->integer('amount');
            $table->integer('discount');
            $table->string('starts');
            $table->string('ends');
            $table->timestamps();
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
