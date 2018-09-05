<?php

namespace App\Http\Controllers;

use App\WallMessage;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        Paginator::defaultView('pagination::default');

        $wallMessages = WallMessage::all();

        return view('user.dashboard.dashboard', ['wallMessages' => $wallMessages]);
    }

    public function logout() 
    {
        auth()->logout();

        flash('Déconnecté')->success();

        return redirect('/');
    }

    public function saveNewPassword()
    {
        request()->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = auth()->user();
        $user->update([
            'password' => bcrypt(request('password')),
        ]);

        flash('Mot de passe mis à jour')->success();

        return back();
    }

    public function indexNewPassword() 
    {
        if (!auth()->check()) {
            flash('Vous devez vous connecté pour accèder à cette page.')->error();
            return redirect('/login');
        }
        return view('user.dashboard.parameter');
    }

    public function modifyAvatar()
    {
        request()->validate([
            'avatar' => 'required|image'
        ]);

        $path = request('avatar')->store('profile/avatar', 'public');
        
        auth()->user()->update([
            'avatar' => $path
        ]);
        
        flash('Votre avatar a été mis à jour')->success();
        return back();
    }

    public function modifyBackground()
    {
        request()->validate([
            'background' => 'required|image'
        ]);

        $path = request('background')->store('profile/background', 'public');
        
        auth()->user()->update([
            'background' => $path
        ]);
        
        flash('Votre arrière plan a été mis à jour')->success();
        return back();
    }

    public function newWallMessageView()
    {
        return view('user.dashboard.create-wall-message');
    }

    public function newWallMessage()
    {
        request()->validate([
            'body' => 'required'
        ]);

        WallMessage::create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        flash('Votre message d\'humeur a été créé')->success();
        return redirect('/dashboard');
    }

    public function notificationView()
    {
        $favoritesUsers = Favorite::where([
            ['user_id', auth()->user()->id],
            ['favorited_type', 'user']
        ])->get();

        $favoritesThreads = Favorite::where([
            ['user_id', auth()->user()->id],
            ['favorited_type', 'thread']
        ])->get();

        $favoritesChannels = Favorite::where([
            ['user_id', auth()->user()->id],
            ['favorited_type', 'channel']
        ])->get();

        return view('user.dashboard.notifications', [
            'favoritesUsers' => $favoritesUsers,
            'favoritesThreads' => $favoritesThreads,
            'favoritesChannels' => $favoritesChannels
        ]);
    }
}
