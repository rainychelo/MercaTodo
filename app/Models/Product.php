<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable=[
        'name',
        'value',
        'image_path',
        'deactive_at',
        'stock'
    ];

}
