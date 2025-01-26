<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('character_cursed_technique', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('cursed_technique_id');

            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            $table->foreign('cursed_technique_id')->references('id')->on('cursed_techniques')->onDelete('cascade');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character_cursed_technique');
    }
};
