@extends('layout')

@section('content')

    <form method="post" class="container" id="form-confirmed">
        @csrf

        <div class="flex flex-col items-center">
            <input name="name" class="w-2/3 h-8  mt-8" type="text" id="name" placeholder="Nom de la catégorie" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
            <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded mt-4">Envoyer</button>
        </div>
    </form>

@endsection