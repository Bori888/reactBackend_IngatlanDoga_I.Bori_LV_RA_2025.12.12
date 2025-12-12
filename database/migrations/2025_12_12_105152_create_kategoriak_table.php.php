<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategoriak', function (Blueprint $table) {
            $table->id();
            $table->string('kategoria_nev'); // seeder ezt használja
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoriak');
    }
};
