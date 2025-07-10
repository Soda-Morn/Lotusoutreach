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
        Schema::create('focus_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('focus_area_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focus__cards');
    }
};
