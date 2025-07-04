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
        Schema::create('why_girls', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('page_content_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_girls');
    }
};
