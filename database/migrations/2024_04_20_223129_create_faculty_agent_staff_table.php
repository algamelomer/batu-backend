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
        Schema::create('faculty_agent_staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('email')->nullable();
            $table->text('word');
            $table->string('cv')->nullable();
            $table->string('position');
            // $table->foreignId('staff_socials_id')->constrained('staff_socials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_agent_staff');
    }
};
