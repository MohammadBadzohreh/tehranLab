<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsesTable extends Migration
{
    public function up()
    {
        Schema::create('newses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("title");
            $table->string("banner");
            $table->longText("body");
            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("CASCADE")
                ->onUpdate("CASCADE");
        });
    }


    public function down()
    {
        Schema::dropIfExists('newses');
    }
}
