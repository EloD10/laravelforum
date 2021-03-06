<?php

namespace App;

use App\Channel;
use App\Reply;
use App\User;
use App\Filters\Filters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Thread extends Model
{
    
    protected $fillable = [
        'user_id', 'channel_id', 'title', 'body',
    ];

    public function replies() 
    {
        return $this->hasMany(Reply::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function channel() 
    {
        return $this->belongsTo(Channel::class);
    }

    public function ownedByAuthUser(User $user): bool
    {
        if ($this->user->id === $user->id) {
            return true;
        }
        
        return false;
    }

}
