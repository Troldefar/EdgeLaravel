<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['game_length', 'victory', 'team_one', 'team_two', 'statistics'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
