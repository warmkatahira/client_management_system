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
        Schema::create('base_client_sales', function (Blueprint $table) {
            $table->increments('base_client_sales_id');
            $table->unsignedInteger('base_client_id');
            $table->string('year_month', 7);
            $table->unsignedInteger('amount')->default(0);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('base_client_id')->references('base_client_id')->on('base_client')->cascadeOnDelete();
            // base_clientごとに月単位で1件だけにするユニーク制約
            $table->unique(['base_client_id', 'year_month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_client_sales');
    }
};
