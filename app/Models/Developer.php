<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'developer_game', 'developer_id', 'game_id');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'developer_publisher', 'developer_id', 'publisher_id');
    }
}
