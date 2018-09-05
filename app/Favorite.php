<?php

namespace App;

use App\Channel;
use App\User;
use App\Thread;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'favorited_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class, 'favorited_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'favorited_id');
    }
}
