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
        Schema::create('client_client_service', function (Blueprint $table) {
            $table->increments('client_client_service_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('client_service_id');
            $table->timestamps();
            // ユニーク制約
            $table->unique(['client_id', 'client_service_id']);
            // 外部キー制約
            $table->foreign('client_id')->references('client_id')->on('clients')->cascadeOnDelete();
            $table->foreign('client_service_id')->references('client_service_id')->on('client_services')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_client_service');
    }
};
