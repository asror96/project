<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'place_category_id',
        'average_rating'
    ];
    public $timestamps = false;
}
