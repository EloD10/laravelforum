@extends('layout')

@section('content')

<div class="flex flex-wrap justify-center my-4">
    @foreach ($channels as $channel)
    <div class="w-1/3 p-2 shadow bg-white m-2 rounded hover:shadow-none">
        <a href="/channel/{{ $channel->slug }}" class="text-blue-darker no-underline hover:text-blue-light font-bold">{{ $channel->name }}</a>
        @if(auth()->check())
            @if (auth()->user()->role === 1)
                <div class="flex flex-wrap justify-end">
                    <a href="/channel/action/{{ $channel->slug }}/update" class="bg-blue rounded no-underline text-blue-lightest text-sm font-semibold text-center p-1 shadow-inner hover:bg-blue-light hover:text-blue-darker mr-2" id="confirmation-button">
                    Modifier
                    </a> 
                    {{-- <div class="bg-green absolute">Confirmation</div> --}}
                    <form method="post" id="form-confirmed" action="/channel/action/{{ $channel->slug }}/delete">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input name="channel_slug" value="{{ $channel->slug }}" type="hidden">
                    <input name="channel_id" value="{{ $channel->channel_id }}" type="hidden">
                    <button type="submit" class="bg-red rounded no-underline text-red-lightest text-sm font-semibold text-center p-1 shadow-inner hover:bg-red-light hover:text-red-darker">
                        Supprimer
                    </button> 
                    </form> 
                </div>
            @endif
        @endif
    </div>
    @endforeach
</div>

<div class="flex justify-center">{{ $channels->links() }}<div>

@endsection