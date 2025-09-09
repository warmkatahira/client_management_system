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
            $table->unsignedInteger('client_code')->unique();
            $table->string('client_name', 100)->unique();
            $table->string('representative_name', 20);
            $table->string('client_postal_code', 8)->nullable();
            $table->unsignedInteger('prefecture_id')->nullable();
            $table->string('client_address', 255)->nullable();
            $table->string('client_tel', 13)->nullable();
            $table->string('client_url', 255)->nullable();
            $table->string('client_invoice_number', 13)->nullable();
            $table->string('client_image_file_name', 50)->default('no_image.png');
            $table->unsignedInteger('company_type_id');
            $table->unsignedInteger('industry_id');
            $table->unsignedInteger('account_type_id');
            $table->unsignedInteger('collection_term_id');
            $table->unsignedInteger('sort_order')->default(10000);
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            // 外部キー制約
            $table->foreign('industry_id')->references('industry_id')->on('industries')->cascadeOnUpdate();
            $table->foreign('company_type_id')->references('company_type_id')->on('company_types')->cascadeOnUpdate();
            $table->foreign('account_type_id')->references('account_type_id')->on('account_types')->cascadeOnUpdate();
            $table->foreign('prefecture_id')->references('prefecture_id')->on('prefectures')->cascadeOnUpdate();
            $table->foreign('updated_by')->references('user_no')->on('users')->cascadeOnUpdate();
            $table->foreign('collection_term_id')->references('collection_term_id')->on('collection_terms')->cascadeOnUpdate();
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
