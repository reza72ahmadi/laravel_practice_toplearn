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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('tocken');
            $table->foreignId('user_id')->constrained();
            $table->string('otp_cod');
            $table->string('login_id')->comment('email or mobile');
            $table->tinyInteger('type')->comment('1 => email , 0=>mobil');
            $table->tinyInteger('used')->default(0)->comment('1 => used , 0=>unused');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
