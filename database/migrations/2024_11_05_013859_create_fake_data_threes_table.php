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
            $table->float('cash');
            $table->float('gcash');
            $table->float('print_sales');
            $table->float('merch_sales');
            $table->float('custom_sales');
            $table->float('total_sales');
            $table->float('print_expenses');
            $table->float('merch_expenses');
            $table->float('custom_expenses');
            $table->float('total_expenses');
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
