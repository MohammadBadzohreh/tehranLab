<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("journal_id");
            $table->string("title");
            $table->string("file");
            $table->longText("summry");
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("CASCADE")
                ->onUpdate("CASCADE");
            $table->foreign("journal_id")
                ->references("id")
                ->on("journals")
                ->onDelete("CASCADE")
                ->onUpdate("CASCADE");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
