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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('product');
            $table->foreignId('amazing_sale_id')->nullable()->constrained('amazing_sales')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('amazing_sale_object');
            $table->decimal('amazing_sale_discount_amount', 20, 3)->nullable();
            $table->integer('number')->default(1);
            $table->decimal('final_product_price', 20, 3)->nullable();
            $table->decimal('final_total_price', 20, 3)->nullable()->comment('number * final_total_price');
            $table->foreignId('color_id')->constrained('product_colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('guarantee_id')->nullable()->constrained('guarantees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
