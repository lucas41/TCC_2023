<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
    protected $table = 'CentroCusto';

    protected $fillable = ['Nome', 'Tipo', 'conta_bancaria_id'];

    public function contaBancaria() 
    {
        return $this->belongsTo(ContaBancaria::class, 'conta_bancaria_id'); 
    }
}
