<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trophie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
