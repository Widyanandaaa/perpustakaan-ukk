<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string('cover');
            $table->text('book_synopsis');
            $table->string('author', 100);
            $table->string('publisher', 100);
            $table->date('publication_year');
            $table->string('title');
            $table->string('book_category', 50);
            $table->string('book_code', 10);
            $table->smallInteger('book_count');
            $table->string('book_status', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
