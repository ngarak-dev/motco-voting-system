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
            $table->ulid('id')->primary();
            $table->string('admission_number')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('sex', ['M', 'F']);
            $table->enum('program', ['NORMAL', 'SPECIAL']);
            $table->string('option'); //Tengeneza table ya Options kwa management nzuri
            $table->enum('year', ['1','2','3']);
            $table->string('dob');
            $table->string('password');
            $table->timestamps();

            $table->index(['admission_number']);
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
