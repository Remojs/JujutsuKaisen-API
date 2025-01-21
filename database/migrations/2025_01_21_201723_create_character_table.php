<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias');
            $table->string('species');
            $table->string('birthday');
            $table->float('height');
            $table->float('weight');
            $table->integer('age');
            $table->string('gender');
            $table->string('animeDebut');
            $table->string('mangaDebut');
            $table->foreignId('affiliation_id')->constrained("affiliations");
            $table->foreignId('occupation_id')->constrained("occupations");
            $table->foreignId('grade_id')->constrained("grades");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character');
    }
};
