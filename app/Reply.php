<?php

namespace App;

use App\Thread;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $fillable = [
        'user_id', 'thread_id', 'body'
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function ownedByAuthUser(User $user): bool
    {
        if ($this->user->id === $user->id) {
            return true;
        }
        
        return false;
    }
}
