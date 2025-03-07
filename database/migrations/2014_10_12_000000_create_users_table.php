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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->integer('volunteer_hours')->default(0);
            $table->integer('participated_initiatives')->default(0);
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->rememberToken(); // لحفظ التوكن لجلسات تسجيل الدخول
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
