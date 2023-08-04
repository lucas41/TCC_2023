<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentoContabil extends Model
{
    protected $table = 'lancamentoContabil';

    protected $fillable = ['Nome', 'Tipo', 'conta_bancaria_id','centro_custo_id'];

    public function contaBancaria() 
    {
        return $this->belongsTo(ContaBancaria::class, 'conta_bancaria_id'); 
    }

    public function CentroCusto() 
    {
        return $this->belongsTo(CentroCusto::class, 'centro_custo_id'); 
    }
}
