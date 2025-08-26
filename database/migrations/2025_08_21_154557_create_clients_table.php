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
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('client_id');
            $table->string('client_code', 50)->unique();
            $table->string('client_name', 100)->unique();
            $table->string('client_postal_code', 8)->nullable();
            $table->string('client_address', 255)->nullable();
            $table->string('client_tel', 13)->nullable();
            $table->string('client_url', 255)->nullable();
            $table->string('client_invoice_number', 13)->nullable();
            $table->string('client_image_file_name', 50)->default('no_image.png');
            $table->unsignedInteger('industry_id');
            $table->string('base_id', 10);
            $table->unsignedInteger('sort_order')->default(10000);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            // 外部キー
            $table->foreign('base_id')->references('base_id')->on('bases')->cascadeOnUpdate();
            $table->foreign('industry_id')->references('industry_id')->on('industries')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
