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
        Schema::create('fiscal_terms', function (Blueprint $table) {
            $table->increments('fiscal_term_id');
            $table->unsignedTinyInteger('term_number')->unique();
            $table->string('term_start', 7);
            $table->string('term_end', 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiscal_terms');
    }
};
