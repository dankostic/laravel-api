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
            $table->foreignId('currency_id')->constrained();
            $table->unsignedBigInteger('currency_purchased_id');
            $table->foreignId('surcharges_id')->constrained();
            $table->double('amount_of_surcharge');
            $table->double('amount_of_currency_purchased');
            $table->double('amount_paid_in_dollars');
            $table->double('discount_percentage')->nullable();
            $table->double('discount_amount')->nullable();
            $table->date('created');

            $table->foreign('currency_purchased_id')->references('currency_purchased_id')->on('exchange_rates')->onDelete('cascade');
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
