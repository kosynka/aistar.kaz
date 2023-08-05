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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('slug')->unique();
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount_price')->nullable();
            $table->unsignedInteger('amount');
            $table->foreignId('category_id');
            $table->foreignId('prosklad_id');
            $table->boolean('has_discount')->nullable()->default(false);
            $table->unsignedInteger('relevance_weight')->nullable();
            $table->unsignedInteger('views_count')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
