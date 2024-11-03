<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'start_time', 'end_time', 'status'];

    protected $fillable = [
        'title',
        'name',
        'start_time',
        'end_time',
        'status',
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    protected $table = 'games';
}
