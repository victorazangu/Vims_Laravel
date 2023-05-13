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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('adm_no');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('profile');
            $table->string('program');
            $table->string('status');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('id_no');
            $table->string('dob');
            $table->string('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
