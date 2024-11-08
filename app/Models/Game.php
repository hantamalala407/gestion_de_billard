<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'player1', 
        'player2', 
        'start_time',
        'end_time',
        'status',
    ];

    // Sinon, vous pouvez la supprimer.
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    protected $table = 'games';
}
