<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('pivot_tags_post', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('post_id');
    //         $table->unsignedBigInteger('tag_post_id');
    //         $table->timestamps();

    //         $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    //         $table->foreign('tag_post_id')->references('id')->on('tags_post')->onDelete('cascade');
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('pivot_tags_post');
    // }
};
