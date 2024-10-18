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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->string('NomeColaborador')->nullable();
            $table->string('Unidade', '10');
            $table->unsignedBigInteger('livro_models_id')->unsigned();
            $table->foreign('livro_models_id')->references('id')->on('livro_models');

            // $table->foreignId('livro_models_id')->constrained();
            // $table->unsignedBigInteger('livro_models_id'); // Coluna de chave estrangeira
            // Definir o relacionamento com a tabela B
            // $table->foreign('livro_models_id')->references('id')->on('livro_models')->onDelete('cascade');
            $table->date('DataEmprestimo')->nullable();
            $table->date('DataDevolucao')->nullable();
            $table->text('Observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
