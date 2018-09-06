@extends('layout')

@section('content')

<div class="flex flex-col items-center">
@if( $user->threads->count() == 0)
    <p class="p-4 text-xl font-semibold text-blue-darkest">Pas de sujets pour cette utilisateur !</p>
@else
    @foreach ($user->threads as $thread)
        <div class="p-4 my-2 bg-white shadow w-full">
            <p class="text-sm text-grey-dark flex items-center mb-2 text-sm">{{ $thread->updated_at->diffForHumans() }}</p>
            <span class="text-blue-darkest">{{ $thread->body }}</span>
        </div>
    @endforeach
        <div>{{ $user->threads()->paginate(15) }}</div>
@endif
</div>

@endsection