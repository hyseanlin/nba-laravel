<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'home',
        'zone',
        'created_at'
    ];

    public function scopeZone($query, $zone)
    {
        $query->where('zone', '=', $zone);
    }
}
