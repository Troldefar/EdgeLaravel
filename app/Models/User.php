<?php

namespace App\Models;

Use App\Models\Invite;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** Friend relationship
     * 1 User can have many friends
     * 1 User acts as a friend himself even though the "type" is user
     */

    public function friends()
    {
        return $this->belongsToMany('User', 'friend_user', 'user_id', 'friend_user');
    }

    public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }

    public function invites($id)
    {
        return Invite::where('user_id', $id);
    }

    public function games() 
    {
        return $this->belongsToMany(Game::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();
        return $this->api_token;
    }
}
