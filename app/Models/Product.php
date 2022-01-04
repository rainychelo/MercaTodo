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
        'image_path'
    ];

    public  function category(){
        return $this->belongsTo(Category::class);
    }
}
