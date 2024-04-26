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
        Schema::create('staff_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->string('cv')->nullable();
            $table->string('position');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('faculty_id')->nullable()->constrained('faculties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_members');
    }
};
