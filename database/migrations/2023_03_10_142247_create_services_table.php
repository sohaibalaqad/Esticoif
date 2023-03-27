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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('enName');
            $table->string('arName')->nullable();
            $table->string('frName')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('price')->nullable();
            $table->enum('type', ['barber', 'hairdresser', 'chaser', 'beautician'])->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
