<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = ['amount', 'type', 'card_id'];

    protected $casts = [
        'amount' => 'decimal:2'
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
