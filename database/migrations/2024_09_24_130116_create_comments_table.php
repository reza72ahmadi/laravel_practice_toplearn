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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->foreignId('parent_id')->nullable()->constrained('comments');
            $table->foreignId('author_id')->constrained('users');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->tinyInteger('seen')->default(0)->comment('0 => unseen, 1 => seen');
            $table->tinyInteger('approved')->default(0)->comment('0 => not approved, 1 => approved');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
