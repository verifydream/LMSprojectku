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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->text('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('file_pdf')->nullable();
            $table->string('file_ppt')->nullable();
            $table->string('file_word')->nullable();
            $table->string('file_video')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('rating')->default(5);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
