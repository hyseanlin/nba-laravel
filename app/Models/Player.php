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

    public function scopeAllData($query)
    {
        $query->join('teams', 'players.tid', '=', 'teams.id')
            ->orderBy('players.id')
            ->select(
                'players.id',
                'players.name as pname',
                'teams.name as tname',
                'players.position',
                'players.height',
                'players.weight',
                'players.year',
                'players.nationality');
    }

    public function scopeSenior($query)
    {
        $query->join('teams', 'players.tid', '=', 'teams.id')
            ->where('year', '>', 10)
            ->orderBy('year')
            ->select(
                'players.id',
                'players.name as pname',
                'teams.name as tname',
                'players.position',
                'players.height',
                'players.weight',
                'players.year',
                'players.nationality');
    }

    public function scopeAllPositions($query)
    {
        $query->select('position')->groupBy('position');
    }

    public function scopePosition($query, $pos)
    {
        $query->join('teams', 'players.tid', '=', 'teams.id')
            ->where('position', '=', $pos)
            ->orderBy('year')
            ->select(
                'players.id',
                'players.name as pname',
                'teams.name as tname',
                'players.position',
                'players.height',
                'players.weight',
                'players.year',
                'players.nationality');
    }
}
