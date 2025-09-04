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
        Schema::create('base_client_service', function (Blueprint $table) {
            $table->increments('base_client_service_id');
            $table->unsignedInteger('base_client_id');
            $table->unsignedInteger('service_id');
            $table->timestamps();
            // ユニーク制約
            $table->unique(['base_client_id', 'service_id']);
            // 外部キー制約
            $table->foreign('base_client_id')->references('base_client_id')->on('base_client')->cascadeOnDelete();
            $table->foreign('service_id')->references('service_id')->on('services')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_client_service');
    }
};
