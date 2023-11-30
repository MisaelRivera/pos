<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number')->autoIncrement();
            $table->float('subtotal');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('cash_id')->references('id')->on('cashes');
            $table->string('payment_method');
            $table->integer('recieved_pay')->nullable();
            $table->foreignId('client_id')->references('id')->on('clients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};