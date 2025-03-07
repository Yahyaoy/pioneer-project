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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المؤسسة/الشركة
            $table->string('logo')->nullable(); // شعار المؤسسة
            $table->string('country'); // الدولة
            $table->string('city'); // المدينة
            $table->string('type'); // نوع المؤسسة (شركة، منظمة، ..)
            $table->string('sector'); // قطاع العمل (برمجة، تصميم، ..)
            $table->enum('size', ['small', 'medium', 'large']); // حجم الشركة            $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
