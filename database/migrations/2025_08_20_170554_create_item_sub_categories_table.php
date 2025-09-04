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
        Schema::create('item_sub_categories', function (Blueprint $table) {
            $table->increments('item_sub_category_id');
            $table->unsignedInteger('item_category_id');
            $table->string('item_sub_category_name', 50)->unique();
            $table->unsignedInteger('sort_order')->default(10000);
            $table->unsignedInteger('updated_by')->default(1);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('item_category_id')->references('item_category_id')->on('item_categories')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_sub_categories');
    }
};
