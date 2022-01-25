<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingCar extends Model
{
    use HasFactory;

    public function shoppingCarItems():HasMany
    {
        return $this->hasMany(ShoppingCarItem::class);
    }
}
