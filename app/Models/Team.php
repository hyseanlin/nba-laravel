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
        return $query->where('zone', '=', $zone);
    }

    public function players()
    {
        return $this->hasMany('App\Models\Player', 'tid');
    }

    public function delete()
    {
        $this->players()->delete();
        return parent::delete();
    }
}
