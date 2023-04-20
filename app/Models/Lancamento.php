<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    use HasFactory;

    protected $table = 'lancamentos';
    protected $fillable = ['valor', 'descricao', 'data', 'tipo'];

    public function getValorAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
