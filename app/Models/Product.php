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
        'status',
        'category_id',
        'image_id'
    ];

    public  function category(){
        return $this->belongsTo(Category::class);
    }

    public  function image(){
        return $this->belongsTo(Image::class);
    }
}
