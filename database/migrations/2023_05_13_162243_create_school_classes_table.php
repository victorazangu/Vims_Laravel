<?php

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Program;
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
        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(Program::class);
            $table->foreignIdFor(Lecturer::class);
            $table->string('country');
            $table->string('state');
            $table->string('county');
            $table->string('city'); 
            $table->string('venue');
            $table->string('starts');
            $table->string('ends');
            $table->string('day');
            $table->string('type');
            $table->string('url');
            $table->boolean('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_classes');
    }
};
