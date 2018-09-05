<?php

namespace App\Http\Controllers;

use App\User;
use App\WallMessage;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * List all users.
     *
     * @return Response
     */
    public function list() {
        $users = User::all();

        return view('user.users', [
            'users' => $users,
        ]);
    }

    public function show() {
        Paginator::defaultView('pagination::default');

        $wallMessages = WallMessage::all();
        $user = User::where('id', request('id'))->firstOrFail();

        return view('user.user', [
            'user' => $user,
            'wallMessages' => $wallMessages,
        ]);
    }

    public function showThreads()
    {
        Paginator::defaultView('pagination::default');

        $user = User::where('id', request('id'))->firstOrFail();
        $threads = $user->threads->sortByDesc(function ($thread) {
            return $thread->created_at;
        });
        
        return view('user.threads', [
            'user' => $user,
            'threads' => $threads,
        ]);
    }

    public function showReplies()
    {
        Paginator::defaultView('pagination::default');

        $user = User::where('id', request('id'))->firstOrFail();
        $replies = $user->replies->sortByDesc(function ($reply) {
            return $reply->created_at;
        });

        return view('user.replies', [
            'user' => $user,
            'replies' => $replies,
        ]);
    }

    public function favorite()
    {
        $user = auth()->user();
        $userWillFollowed = User::where('id', request('id'))->firstOrFail();
        
        $user->favorites()->attach($userWillFollowed, ['favorited_type' => 'user']);
        
        flash('Utilisateur suivis')->success();
        return back();
    }

    public function deleteFavorite()
    {
        $user = auth()->user();
        $userFollowed = User::where('id', request('id'))->firstOrFail();
        
        $user->favorites()->detach($userFollowed, ['favorited_type' => 'user']);
        
        flash('L\'utilisateur n\'est plus suivi')->success();
        return back();
    }


    public function addModeratorRole()
    {
        User::where('id', request('id'))
            ->update([
            'role' => 2
        ]);
        
        flash( request('name') . ' est maintenant modérateur')->success();
        return back();
    }

    public function removeModeratorRole()
    {
        User::where('id', request('id'))
            ->update([
            'role' => 5
        ]);
        
        flash( request('name') . ' n\'est maintenant plus modérateur')->success();
        return back();
    }
}
