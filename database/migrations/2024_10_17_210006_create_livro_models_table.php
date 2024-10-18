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
        Schema::create('livro_models', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Autor');
            $table->string('Editora');
            // $table->enum('Situacao', ['Disponível', 'Em Uso', 'Cancelado']);
            $table->boolean('Disponivel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_models');
    }
};
