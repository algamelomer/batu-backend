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
        Schema::create('apply_staff', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->TEXT('description');
            $table->string('image')->nullable();
            $table->enum('category', ['administrative', 'teaching_staff', 'other']);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_staff');
    }
};
