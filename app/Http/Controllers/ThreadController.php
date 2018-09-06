<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use App\User;
use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['indexOfOneThread', 'index']);
        $this->middleware('moderator')
            ->except(['indexOfOneThread', 'index', 'favorite', 'update', 
            'updateView', 'deleteFavorite', 'create', 'delete', 'store']);
    }

    // TODO generic solution
    public function index()
    {
        Paginator::defaultView('pagination::default');
        
        $user = new Collection();
        $threads = new Collection();
        if (request()->has('by')) {
            $user = User::where('name', request('by'))->firstOrFail();
        }

        // if (request()->has('popular')) {
        //     $threads = Thread::all()->paginate(15);
        //     $threads->replies()->orderBy('replies_count', 'desc');
        // }

        return view('thread.index', [
            'user' => $user,
        ]);
        
    }

    public function indexOfOneThread() 
    {
        Paginator::defaultView('pagination::default');

        $thread = Thread::where('id', request('id'))->firstOrFail();
        return view('thread.thread', [
            'thread' => $thread,
        ]);
    }

    public function create() 
    {
        $channel = Channel::where('slug', request('slug'))->first();
        return view('thread.create', [
            'channel' => $channel,
        ]);
    }

    public function store() 
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'channel' => 'required|exists:channels,id'
        ]);
        

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel'),
            'title' => request('title'),
            'body' => request('body')
        ]);

        flash('Sujet créé !')->success();
        return redirect('/thread/' . $thread->id);
    }

    public function update()
    {  
        $thread = Thread::where('id', request('id'))->firstOrFail();
        
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
            
        $thread->update([
            'title' => request('title'),
            'body' => request('body')
            ]);
                
        flash('Sujet modifié !')->success();
        return redirect('/thread/' . $thread->id);
    }

    public function updateView()
    {
        $thread = Thread::where('id', request('id'))->firstOrFail();

        return view('thread.update', ['thread' => $thread]);
    }

    public function delete()
    {  
        $thread = Thread::where('id', request('thread_id'))->firstOrFail();

        Thread::destroy(request('thread_id'));

        flash('Sujet supprimé !')->success();
        return redirect('/channel/' . $thread->channel->slug);  
    }
    

    public function favorite()
    {   
        $user = auth()->user();
        $threadWillFollowed = Thread::where('id', request('id'))->firstOrFail();
        
        $user->favorites()->attach($threadWillFollowed, ['favorited_type' => 'thread']);
        
        flash('Catégorie suivis')->success();
        return back();
    }

    public function deleteFavorite()
    {   
        $user = auth()->user();
        $threadFollowed = Thread::where('id', request('id'))->firstOrFail();
        
        $user->favorites()->detach($threadFollowed, ['favorited_type' => 'thread']);
        
        flash('La catégorie n\'est plus suivis')->success();
        return back();
    }
}
