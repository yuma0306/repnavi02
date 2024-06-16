<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'pet_image1',
        'pet_image2',
        'pet_image3',
        'pet_image4',
        'title',
        'category',
        'species',
        'morph',
        'sex',
        'age',
        'size',
        'weight',
        'arrival_day',
        'price',
        'description',
        'public_flag',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
