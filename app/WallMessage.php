<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallMessage extends Model
{
    protected $fillable = ['user_id', 'body'];
}
