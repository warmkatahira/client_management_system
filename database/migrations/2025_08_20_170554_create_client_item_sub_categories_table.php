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
        Schema::create('client_item_sub_categories', function (Blueprint $table) {
            $table->increments('client_item_sub_category_id');
            $table->unsignedInteger('client_item_category_id');
            $table->string('client_item_sub_category_name', 50)->unique();
            $table->unsignedInteger('sort_order')->default(10000);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('client_item_category_id')->references('client_item_category_id')->on('client_item_categories')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_item_sub_categories');
    }
};
