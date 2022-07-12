<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('visibility')->nullable();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
