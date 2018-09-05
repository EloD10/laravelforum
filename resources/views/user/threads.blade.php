@extends('layout')

@section('content')

@include('user.navigation')

<div class="w-full flex flex-col flex-wrap">
    @foreach ($threads as $thread)
        <a href="/thread/{{ $thread->id }}" class="text-grey-darker hover:shadow-md bg-white shadow px-4 py-4 m-2 no-underline hover:text-blue-light rounded">
            <div class="text-bold">{{ $thread->title }}</div>
            <div class="text-xs italic mt-2">{{ $thread->created_at }}</div>
        </a>
    @endforeach
    {{ $user->threads()->paginate(10) }}
</div>

@endsection