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
        Schema::create('book_user', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->comment('ユーザーID');
                $table->unsignedBigInteger('books_id')->comment('課題本ID');
                $table->timestamps();
    
            // 外部キー
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('books_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user');
    }
};
