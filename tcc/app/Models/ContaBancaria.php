<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    protected $table = 'conta_bancaria';

    protected $fillable = ['Nome_banco', 'Agencia', 'Numero', 'user_id'];

    public function users()
    {
        return $this->belongsTo(users::class);
    }
}
