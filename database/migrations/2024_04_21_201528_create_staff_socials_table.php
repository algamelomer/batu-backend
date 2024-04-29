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
        Schema::create('staff_socials', function (Blueprint $table) {
            $table->id();
            $table->enum('name',['Facebook', 'Instagram', 'X', 'LinkedIN', 'GitHub']);
            $table->string('link');
            $table->string('image');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('staff_programs_id')->nullable()->constrained('staff_programs')->onDelete( 'cascade')->onUpdate('cascade');
            $table->foreignId('staff_members_id')->nullable()->constrained('staff_members')->onDelete( 'cascade')->onUpdate('cascade');
            $table->foreignId('faculty_leaders_id')->nullable()->constrained('faculty_leaders')->onDelete( 'cascade')->onUpdate('cascade');
            $table->foreignId('university_leaders_id')->nullable()->constrained('university_leaders')->onDelete( 'cascade')->onUpdate('cascade');
            $table->foreignId('faculty_agent_staff_id')->nullable()->constrained('faculty_agent_staff')->onDelete( 'cascade')->onUpdate('cascade');
            $table->foreignId('leader_council_id')->nullable()->constrained('leader_councils')->onDelete( 'cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_socials');
    }
};
