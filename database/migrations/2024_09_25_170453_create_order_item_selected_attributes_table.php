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
        Schema::create('order_item_selected_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->constrained('order_items')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_attribute_id')->constrained('category_attributes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_value_id')->constrained('category_values')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item_selected_attributes');
    }
};
