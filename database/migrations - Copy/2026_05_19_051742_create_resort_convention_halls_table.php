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
        Schema::create('resort_convention_halls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('beds')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('size')->nullable();
            $table->string('location')->nullable();

            $table->string('image')->nullable();
            $table->string('image_thumb')->nullable();
            $table->string('floor_plans_image')->nullable();

            $table->boolean('status')->default(1);
            $table->boolean('activity')->default(1);

            $table->longText('description')->nullable();

            $table->enum('property_type', [
                'resort',
                'convention_hall'
            ])->default('resort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resort_convention_halls');
    }
};
