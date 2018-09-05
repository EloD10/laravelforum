<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'indexOfOneChannel']);
        $this->middleware('admin')->except(['index', 'indexOfOneChannel', 'favorite', 'deleteFavorite']);
    }

    public function index() 
    {
        Paginator::defaultView('pagination::default');

        $channels = Channel::paginate(15);
        return view('channel.index', [
            'channels' => $channels,
        ]);
    }

    public function indexOfOneChannel() 
    {
        Paginator::defaultView('pagination::default');

        $channel = Channel::where('slug', request('slug'))->firstOrFail();
        // $threads = Thread::where('channel_id', $channel->id)->latest()->get();
        
        return view('channel.channel', [
            'channel' => $channel,
            'threads' => $channel->threads,
        ]);
    }

    public function indexCreate()
    {
        return view('channel.create');
    }

    public function create()
    {
        $slug = strtolower(str_replace(' ', '-', request('name')));

        request()->validate([
            'name' => 'required|unique:channels,name',
        ]);

        Channel::create([
            'name' => request('name'),
            'slug' => $slug
        ]);

        flash('Catégorie créée !')->success();
        return redirect('/forum');
    }

    public function indexUpdate()
    {
        $channel = Channel::where('slug', request('slug'))->firstOrFail();

        return view('channel.update', ['channel' => $channel]);
    }

    public function update()
    {
        $slug = strtolower(str_replace(' ', '-', request('name')));

        request()->validate([
            'name' => 'required|unique:channels,name',
        ]);
        
        $channel = Channel::where('slug', request('slug'))->firstOrFail();
        $channel->update([
            'name' => request('name'),
            'slug' => $slug
        ]);

        flash('Catégorie mise à jour !')->success();
        return redirect('/forum');
    }

    public function delete()
    {
        $channel = Channel::where('slug', request('slug'))->firstOrFail();
        $channel->delete();

        flash('Catégorie supprimée !')->success();
        return redirect('/forum');
    }

    public function favorite()
    {   
        $user = auth()->user();
        $channelWillFollowed = Channel::where('slug', request('slug'))->firstOrFail();
        
        $user->favorites()->attach($channelWillFollowed, ['favorited_type' => 'channel']);
        
        flash('Catégorie suivis')->success();
        return back();
    }

    public function deleteFavorite()
    {
        $user = auth()->user();
        $channelFollowed = Channel::where('slug', request('slug'))->firstOrFail();
        
        $user->favorites()->detach($channelFollowed, ['favorited_type' => 'channel']);
        
        flash('Catégorie supprimée des suivis')->success();
        return back();
    }
}
