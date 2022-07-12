<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('payment_method_id')->nullable()->constrained();
            $table->string('address');
            $table->string('city');
            $table->string('postcode')->nullable();
            $table->string('mobile');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
