<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("title");
            $table->longText("body")->nullable();
            $table->timestamps();
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("CASCADE")
                ->onDelete("SET NULL");
        });
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
