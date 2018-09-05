@extends('layout')

@section('content')

<div class="flex justify-between bg-blue-lighter shadow mt-4">
    <div class="text-blue-darker font-bold px-4 py-2 m-2 rounded w-1/2 text-xl leading-tight">{{ $channel->name }}</div>
    <div class="flex align-middle">
        @if(auth()->check())
            <form method="post" action="/channel/action/{{ $channel->slug }}/favorite" class="flex align-middle py-2 px-2">
                @csrf
                @if (auth()->user()->hasFollowChannel($channel))
                    {{ method_field('delete') }}
                    <button class="bg-blue rounded no-underline text-blue-lightest text-sm font-semibold text-center p-1 shadow-inner hover:bg-blue-light hover:text-blue-darker px-2 mr-2">Ne plus suivre</button>
                @else
                    <button class="bg-blue rounded no-underline text-blue-lightest text-sm font-semibold text-center p-1 shadow-inner hover:bg-blue-light hover:text-blue-darker px-2 mr-2">Suivre</button>
                @endif
            </form>
        @endif
        <a href="/channel/{{ $channel->slug }}/new-thread" class="bg-orange rounded no-underline text-orange-lightest text-sm font-semibold text-center shadow-inner hover:bg-orange-light hover:text-orange-darker px-2 py-3 m-2">Nouveau sujet</a>
    </div>
</div>
<div class="flex flex-col justify-between mt-4">
    @foreach ($threads as $thread)
        <a href="/thread/{{ $thread->id }}" class="font-semibold rounded p-4 mt-4 leading-normal bg-white border-t-4 shadow-md border-blue-light text-blue hover:bg-blue hover:text-white no-underline">{{ $thread->title }}</a>
    @endforeach
</div>

<div class="flex justify-center mt-4 mb-8">
    {{ $channel->threads()->paginate(10) }}
</div>
@endsection