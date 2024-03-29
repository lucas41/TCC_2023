<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class users extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'pais',
    ];

    public function updatePassword($senha)
    {

        $this->update([
            'senha' => $senha,
        ]);
    }


}
