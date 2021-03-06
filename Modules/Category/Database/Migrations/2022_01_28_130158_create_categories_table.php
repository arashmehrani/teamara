<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->nullable();
            $table->text('meta_desc')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')
                ->onDelete('set null')
                ->onUpdate('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
