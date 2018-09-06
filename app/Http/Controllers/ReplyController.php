<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        request()->validate([
            'body' => 'required',
        ]);

        Reply::create([
            'user_id' => auth()->user()->id,
            'thread_id' => request('id'),
            'body' => request('body'),
        ]);

        return redirect('/thread/' . request('id'));
    }

    public function updateView()
    {
        $reply = Reply::where('id', request('reply_id'))->firstOrFail();
        if (!$reply->ownedByAuthUser(auth()->user()) && auth()->user()->role != 1) {
            flash('Veuillez vous connecter !')->error();
            return redirect('/login');
        }

        return view('reply.update', ['reply' => $reply]);
    }

    public function update()
    {
        $reply = Reply::where('id', request('reply_id'))->firstOrFail();

        if (!$reply->ownedByAuthUser(auth()->user()) && auth()->user()->role != 1) {
            flash('Veuillez vous connecter !')->error();
            return redirect('/login');
        }

        request()->validate([
            'body' => 'required',
        ]);

        $reply->update([
            'body' => request('body')
        ]);

        flash('Message modifié !')->success();
        return redirect('/thread/' . $reply->thread->id);
    }

    public function delete()
    {
        $reply = Reply::where('id', request('reply_id'))->firstOrFail();
        if (!$reply->ownedByAuthUser(auth()->user()) && auth()->user()->role != 1) {
            flash('Veuillez vous connecter !')->error();
            return redirect('/login');
        }

        $reply->delete();

        flash('Message supprimé !')->success();
        return redirect('/thread/' . $reply->thread->id);
    }
}
