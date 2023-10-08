<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rating;


class Vehicle extends Model
{
    use HasFactory;

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
