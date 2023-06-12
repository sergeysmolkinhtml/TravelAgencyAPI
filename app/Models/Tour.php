<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Tour extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
      'travel_id',
      'name',
      'starting_date',
      'ending_date',
      'price',
    ];

    public function price() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }

    public function scopeFilterPriceRange(Builder $query, $priceFrom, $priceTo): Builder
    {
        if ($priceFrom) {
            $query->where('price', '>=', $priceFrom * 100);
        }

        if ($priceTo) {
            $query->where('price', '<=', $priceTo * 100);
        }

        return $query;
    }

}
