<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel posts
            $table->foreignId('parent_comment_id')->nullable()->constrained('comments')->onDelete('cascade'); // Self-referencing untuk reply
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->text('content'); // Isi dari komentar
            $table->timestamps(); // Waktu pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
