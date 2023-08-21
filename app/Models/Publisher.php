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

    public function publisher()
    {
        return $this->belongsToMany(Publisher::class, 'publisher_game', 'game_id', 'publisher_id');
    }
}
