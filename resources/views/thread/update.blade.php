@extends('layout')

@section('content')

<form method="post" class="container">
    @csrf

    <div class="flex flex-col items-center">
        <input name="title" class="w-2/3 h-8  mt-8" type="text" id="title" value="{{ old('title', $thread->title) }}" >
        @if($errors->has('title'))
            <div class="text-red text-xs italic w-2/3">{{ $errors->first() }}</div>
        @endif
        <textarea name="body" class="w-2/3 h-64 mt-8" id="body" rows="8" required>{{ old('body', $thread->body) }}</textarea>
        @if($errors->has('body'))
            <div class="text-red text-xs italic w-2/3">{{ $errors->first() }}</div>
        @endif
        <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded mt-4">Envoyer</button>
    </div>
</form>

@endsection