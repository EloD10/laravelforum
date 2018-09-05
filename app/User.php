<?php

namespace App;

use App\Channel;
use App\Replies;
use App\Thread;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'background'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'favorited_id')->withTimestamps();
    }

    /**
     * Check if a user follow the context user
     */
    public function hasFollowUser(User $user): bool
    {
        return $this->favorites()->where([
            'favorited_id'=> $user->id,
            'favorited_type'=> 'user',
        ])->exists();
    }

    /**
     * Check if a user follow the context channel
     */
    public function hasFollowChannel(Channel $channel): bool
    {
        return $this->favorites()->where([
            'favorited_id'=> $channel->id,
            'favorited_type'=> 'channel',
        ])->exists();
    }

    /**
     * Check if a user follow the context channel
     */
    public function hasFollowThread(Thread $thread): bool
    {
        return $this->favorites()->where([
            'favorited_id'=> $thread->id,
            'favorited_type'=> 'thread',
        ])->exists();
    }

    public function isModerator(): bool
    {
        if ($this->role === 2) {
            return true;
        }

        return false;
    }
}
