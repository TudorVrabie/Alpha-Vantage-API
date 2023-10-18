<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol'
    ];

    public function getRouteKeyName(): string
    {
        return 'symbol';
    }

    public function price(): HasMany
    {
        return $this->hasMany(Price::class, 'stock_id', 'id');
    }
}
