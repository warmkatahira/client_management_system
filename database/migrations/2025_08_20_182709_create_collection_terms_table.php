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
        Schema::create('collection_terms', function (Blueprint $table) {
            $table->increments('collection_term_id');
            $table->unsignedTinyInteger('collection_term')->unique();
            $table->unsignedInteger('sort_order')->default(10000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_terms');
    }
};
