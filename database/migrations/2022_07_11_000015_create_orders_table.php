<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->uuid('uuid');
            $table->string('email');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('shipping_address_id')->nullable()->constrained();
            $table->foreignId('shipping_type_id')->nullable()->constrained();
            $table->foreignId('payment_method_id')->nullable()->constrained();
            $table->foreignId('series_id')->default(1)->constrained();
            $table->integer('order_number')->nullable();
            $table->integer('subtotal');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
