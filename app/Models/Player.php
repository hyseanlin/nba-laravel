<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'tid',
        'position',
        'height',
        'weight',
        'year',
        'nationality',
        'created_at',
        'updated_at'
    ];

    public function scopeSenior($query)
    {
        $query->where('year', '>', 10)->orderBy('year');
    }
}
