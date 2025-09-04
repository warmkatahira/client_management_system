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
        Schema::create('base_client_item_sub_category', function (Blueprint $table) {
            $table->increments('base_client_item_sub_category_id');
            $table->unsignedInteger('base_client_id');
            $table->unsignedInteger('item_sub_category_id');
            $table->timestamps();
            // ユニーク制約(短い名前に変更している)
            $table->unique(['base_client_id', 'item_sub_category_id'], 'client_sub_cat_unique');
            // 外部キー制約
            $table->foreign('base_client_id', 'fk_client_sub_client')->references('base_client_id')->on('base_client')->cascadeOnDelete();
            $table->foreign('item_sub_category_id', 'fk_client_sub_subcat')->references('item_sub_category_id')->on('item_sub_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_client_item_sub_category');
    }
};
