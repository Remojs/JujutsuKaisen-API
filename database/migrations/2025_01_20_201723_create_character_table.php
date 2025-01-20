<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('character', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("alias");
            $table->string("species");
            $table->string("birthday");
            $table->integer("age");
            $table->string("gender");
            $table->string("occupation");
            $table->string("affiliation");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character');
    }
};
