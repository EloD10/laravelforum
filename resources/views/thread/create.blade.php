@extends('layout')

@section('content')

    <form method="post" class="container" id="form-confirmed">
        @csrf

        <div class="flex flex-col items-center">
            <input name="channel" value="{{ $channel->id }}" type="hidden">

            <input name="title" class="w-2/3 h-8  mt-8" type="text" id="title" placeholder="Title" value="{{ old('title') }}" required>
            @if($errors->has('title'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
            <textarea name="body" class="w-2/3 h-64 mt-8" id="body" rows="8" placeholder="Content" required>{{ old('body') }}</textarea>
            @if($errors->has('body'))
                <p class="text-red text-xs italic">{{ $errors->first() }}</p>
            @endif
            <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded mt-4">Envoyer</button>
        </div>
    </form>

@endsection