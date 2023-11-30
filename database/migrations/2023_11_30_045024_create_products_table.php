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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100);
            $table->string('product', 100);
            $table->string('brand', 100);
            $table->string('presentation', 60);
            $table->foreignId('provider_id')->references('id')->on('providers')->nullable();
            $table->float('price');
            $table->integer('stock')->nullable();
            $table->integer('low_stock')->nullable();
            $table->integer('portion')->nullable();
            $table->integer('low_portion')->nullable();
            $table->boolean('bulk')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
