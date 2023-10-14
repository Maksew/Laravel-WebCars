<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rating;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand', 'model', 'year', 'category', 'energy', 'transmission',
        'agency', 'price', 'kilometrage', 'region', 'engine_rating',
        'chassis_rating', 'handling_rating', 'visual_rating',
        'general_rating', 'description'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
