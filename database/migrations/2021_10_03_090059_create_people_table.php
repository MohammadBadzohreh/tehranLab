<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{

    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("education");
            $table->string("banner");
            $table->string("telegram")->nullable();
            $table->string("instagram")->nullable();
            $table->string("linkedin")->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('people');
    }
}
