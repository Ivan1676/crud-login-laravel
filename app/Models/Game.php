<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'genre',
        'release_date',
        'price',
        'cover',
        'units_sold'
    ];

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_game', 'game_id', 'developer_id');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'publisher_game', 'game_id', 'publisher_id');
    }

    public function trophies()
    {
        return $this->hasMany(Trophy::class, 'game_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
