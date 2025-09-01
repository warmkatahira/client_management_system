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
        Schema::create('sales_ranks', function (Blueprint $table) {
            $table->increments('sales_rank_id');
            $table->string('sales_rank_name', 10)->unique();
            $table->unsignedInteger('min_amount');
            $table->unsignedInteger('max_amount')->nullable();
            $table->unsignedInteger('sort_order')->default(10000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_ranks');
    }
};
