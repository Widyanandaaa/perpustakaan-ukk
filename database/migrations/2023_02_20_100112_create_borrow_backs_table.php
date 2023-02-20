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
        Schema::create('borrow_backs', function (Blueprint $table) {
            $table->id('bb_id');
            $table->bigInteger('user_number');
            $table->string('username');
            $table->string('book_code', 10);
            $table->string('book_title');
            $table->date('borrow_date');
            $table->date('deadline')->nullable();
            $table->date('return_date')->nullable();
            $table->smallInteger('borrowing_amount');
            $table->integer('fine')->nullable();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_backs');
    }
};
