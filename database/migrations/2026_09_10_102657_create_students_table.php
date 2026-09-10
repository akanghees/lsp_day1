<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_profile_id')->constrained('school_profiles')->cascadeOnDelete();
            $table->string('nis', 30)->unique();
            $table->string('name', 100);
            $table->enum('gender', ['L', 'P']);
            $table->string('class', 20)->nullable();
            $table->string('major', 100)->nullable();
            $table->string('photo', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
