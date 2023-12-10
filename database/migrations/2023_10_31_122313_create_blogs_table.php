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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->text('meta_author');
            $table->text('meta_description');
            $table->longText('meta_keyword');
            $table->string('author_name');
            $table->text('image');
            $table->string('alt');
            $table->string('heading')->unique();
            $table->text('short_description')->unique();
            $table->longText('description');
            $table->string('home_status')->default('active');
            $table->string('popular_status')->default('active');
            $table->tinyInteger('blog_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
