<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('faculty_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('head_description')->nullable();
            $table->text('career')->nullable();
            $table->text('scientific_interests')->nullable();
            $table->text('experience')->nullable();
            $table->text('word')->nullable();
            $table->string('certificates_title')->nullable();
            $table->text('certificates_description')->nullable();
            $table->string('email')->nullable();
            $table->string('cv')->nullable();
            $table->string('Researches_title')->nullable();
            $table->string('Researches_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_members');
    }
}
