<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn', 75)->nullable();
            $table->string('title', 250);
            $table->string('thumbnail', 250)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('publisher_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('book_year')->nullable();
            $table->integer('status');
            $table->date('purchase_date')->nullable();
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
        Schema::dropIfExists('books');
    }
}
