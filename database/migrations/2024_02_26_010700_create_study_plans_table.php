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
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('academic_year');
            $table->string('semester');
            $table->string('credits')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('staff_programs_id')->nullable()->constrained('staff_programs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('staff_members_id')->nullable()->constrained('staff_members')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_plans');
    }
};
