<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('variation_id')->references('id')->on('variations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
