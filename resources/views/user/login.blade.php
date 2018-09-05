@extends('layout')

@section('content')

<div class="mx-auto mt-8 w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post">
        @csrf

        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input  name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
        </div>
        
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input name="password" class="shadow appearance- w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Envoyer
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                Mot de passe oublié?
            </a>
        </div>
    </form>
</div>

@endsection