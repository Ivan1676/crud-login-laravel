<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'publisher_game', 'publisher_id', 'game_id');
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_publisher', 'publisher_id', 'developer_id');
    }
}
