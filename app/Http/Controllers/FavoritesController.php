<?php

namespace App\Http\Controllers;

use App\Replies;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Replies $reply) 
    {
        $reply->favorite(auth()->id());
        return back(); 
    }
}
