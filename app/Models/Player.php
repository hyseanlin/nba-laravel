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

    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'tid', 'id');
    }

    public function scopeSenior($query)
    {
        return $query->where('year', '>', 10)
                ->orderBy('year');
    }

    public function scopeAllPositions($query)
    { 
        return $query->select('position')->groupBy('position');
    }

    public function scopePosition($query, $pos)
    {
        return $query->where('position', '=', $pos)
            ->orderBy('year');
    }
}
