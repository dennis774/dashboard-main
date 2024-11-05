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
        Schema::create('fake_data_threes', function (Blueprint $table) {
            $table->id();
            $table->float('orders');
            $table->float('expenses');
            $table->float('cash');
            $table->float('gcash');
            $table->float('sales');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fake_data_threes');
    }
};
