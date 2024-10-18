<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomeColaborador',
        'Unidade',
        'livro_models_id',
        'DataEmprestimo',
        'DataDevolucao',
        'Observacao',
    ];


    public function livro()
    {
        return $this->belongsTo(LivroModel::class, 'livro_models_id');
    }
}
