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
        Schema::create('company_types', function (Blueprint $table) {
            $table->increments('company_type_id');
            $table->string('company_type_name', 20);
            $table->string('company_type_short_name', 10);
            $table->enum('position', ['front', 'back']);
            $table->unsignedInteger('sort_order')->default(10000);
            $table->timestamps();
            // 複合ユニーク制約
            $table->unique(['company_type_name', 'position']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_types');
    }
};
