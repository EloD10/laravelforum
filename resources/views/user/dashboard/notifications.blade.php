@extends('layout')

@section('content')

@include('user.dashboard.dashboard-menu')

<div class="px-8">
    <div class="flex flex-col bg-white shadow-md rounded p-2 my-4">
    <span class="text-sm leading-tight text-blue-dark ">{{ $favoritesUsers[0]->favorited_type }}</span>
    @foreach ($favoritesUsers as $favoritesUser)
    <div class="p-2 my-4 text-blue-darker">
        <a href="/user/{{ $favoritesUser->user->id }}-{{ $favoritesUser->user->name }}" class="text-blue-darker no-underline">{{ $favoritesUser->user->name }}</a>
    </div>
    @endforeach
    </div>
</div>

<div class="px-8">
    <div class="flex flex-col bg-white shadow-md rounded p-2 my-4">
    <span class="text-sm leading-tight text-blue-dark ">{{ $favoritesThreads[0]->favorited_type }}</span>
    @foreach ($favoritesThreads as $favoritesThread)
    <div class="p-2 my-4 text-blue-darker">
        <a href="/thread/{{ $favoritesThread->thread->id }}" class="text-blue-darker no-underline">{{ $favoritesThread->thread->title }}</a>
    </div>
    @endforeach
    </div>
</div>

<div class="px-8">
    <div class="flex flex-col bg-white shadow-md rounded p-2 my-4">
    <span class="text-sm leading-tight text-blue-dark ">{{ $favoritesChannels[0]->favorited_type }}</span>
    @foreach ($favoritesChannels as $favoritesChannel)
    <div class="p-2 my-1">
        <a href="/channel/{{ $favoritesChannel->channel->slug }}" class="text-blue-darker no-underline">{{ $favoritesChannel->channel->name }}</a>
    </div>
    @endforeach
    </div>
</div>

@endsection