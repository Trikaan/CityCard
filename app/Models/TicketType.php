<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'transport_type_id'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function transportType(): BelongsTo
    {
        return $this->belongsTo(TransportType::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
