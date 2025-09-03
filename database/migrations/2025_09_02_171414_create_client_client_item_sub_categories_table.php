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
        Schema::create('client_client_item_sub_category', function (Blueprint $table) {
            $table->increments('client_client_item_sub_category_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('client_item_sub_category_id');
            $table->timestamps();
            // ユニーク制約(短い名前に変更している)
            $table->unique(['client_id', 'client_item_sub_category_id'], 'client_sub_cat_unique');
            // 外部キー制約
            $table->foreign('client_id', 'fk_client_sub_client')->references('client_id')->on('clients')->cascadeOnDelete();
            $table->foreign('client_item_sub_category_id', 'fk_client_sub_subcat')->references('client_item_sub_category_id')->on('client_item_sub_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_client_item_sub_category');
    }
};
