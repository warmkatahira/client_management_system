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
        Schema::create('client_client_item', function (Blueprint $table) {
            $table->increments('client_client_item_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('client_item_id');
            $table->timestamps();
            // ユニーク制約
            $table->unique(['client_id', 'client_item_id']);
            // 外部キー制約
            $table->foreign('client_id')->references('client_id')->on('clients')->cascadeOnDelete();
            $table->foreign('client_item_id')->references('client_item_id')->on('client_items')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_client_item');
    }
};
