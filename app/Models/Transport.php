<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'transport_type_id',
        'city_id'
    ];

    public function transportType(): BelongsTo
    {
        return $this->belongsTo(TransportType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
