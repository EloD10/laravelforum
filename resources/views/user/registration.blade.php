@extends('layout')

@section('content')

<div class="mx-auto mt-4 w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post">
        @csrf

        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="email" >
                Email
            </label>
            <input  name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" value="{{ old('email') }}">
            @if($errors->has('email'))
                <p class="text-red text-xs italic">{{ ($errors)->first() }}</p>
            @endif
        </div>

        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                Nom d'utilisateur
            </label>
            <input  name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="name" value="{{ old('name') }}" >
            @if($errors->has('name'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
        </div>
        
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" >  
            @if($errors->has('password'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
        </div>
        
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password_confirmation">
                Confirmation du mot de passe
            </label>
            <input name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" >
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Envoyer
                </button>
            </div>
        </div>
    </form>
</div>

@endsection