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
        Schema::create('applying_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->TEXT('description');
            $table->string('image')->nullable();
            $table->string('faculty');
            $table->enum('category', ['university_requirements', 'head_section', 'head_page']);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applying_studies');
    }
};
