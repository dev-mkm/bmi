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
        Schema::create('BMIs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('age');
            $table->string('name');
            $table->decimal('bmi', 3, 1);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BMIs');
    }
};
