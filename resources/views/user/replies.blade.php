@extends('layout')

@section('content')

@include('user.navigation')

<div class="w-full flex flex-col flex-wrap">
    @foreach ($replies as $reply)
        <a href="/thread/{{ $reply->thread['id'] }}" class="text-grey-darker hover:shadow-md bg-white shadow px-4 py-4 m-2 no-underline hover:text-blue-light rounded">{{ $reply->body  }}</a>
    @endforeach
    {{ $user->replies()->paginate(10) }}
</div>

@endsection