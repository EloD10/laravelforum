@extends('layout')

@section('content')

@include('user.dashboard.dashboard-menu')

<div class="flex bg-grey-lighter mt-8">
  <div class="flex flex-1 flex-col text-blue-darker bg-white p-8 m-2 shadow-md items-center justify-center h-32">
    <form class="w-full max-w-sm" method="post" action="/modify-avatar" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center border-b border-b-2 border-teal py-4">
        <input name="avatar" class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="file">
        <button class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded" type="submit">
            Changer d'avatar
        </button>
    </div>
    @if($errors->has('avatar'))
        <p class="text-red text-xs italic">{{ $errors->first() }}</p>
    @endif
    </form>

    <form class="w-full max-w-sm" method="post" action="/background-profil" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center border-t border-t-2 border-blue py-4">
        <input name="background" class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="file">
        <button class="flex-no-shrink bg-blue hover:bg-blue-dark border-blue hover:border-blue-dark text-sm border-4 text-white py-1 px-2 rounded" type="submit">
            Changer d'arrière plan
        </button>
    </div>
    @if($errors->has('background'))
        <p class="text-red text-xs italic">{{ $errors->first() }}</p>
    @endif
    </form>
  </div>

<div class="flex w-64 bg-grey-lighter shadow-md text-blue-darker bg-white my-2">
    <ul>
        <li>Optimiser les requetes</li>
        <li>Dashboard, suivre un utilisateur et avoir ses messages/sujets et être notifié</li>
        <li>Design</li>
    </ul>
  </div>
  
  <div class="flex text-blue-darker bg-white p-4 m-2 shadow-md justify-center">
    <form class="bg-white rounded p-4 mb-4" method="post" action="/new-password">
        @csrf

        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input  name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="password" required>
            @if($errors->has('password'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
        </div>
        <div>
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Mot de passe (confirmation)
            </label>
            <input  name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" placeholder="password_confirmation" required>
        </div>
        <div class="flex items-center justify-between pt-4  ">
            <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Modifier mon mot de passe
            </button>
        </div>
    </form>
  </div>
</div>

@endsection