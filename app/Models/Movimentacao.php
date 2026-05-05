<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movimentacao extends Model
{
    protected $fillable = [
        'quantidade',
        'data_movimentacao',
        'tipo',
        'user_id',
        'produto_id'
    ];


    public function produto():BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
