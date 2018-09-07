@extends('layout')

@section('content')

<div class="flex flex-col">
  <div class="flex justify-between w-full text-blue-darker font-semibold p-4 mt-4 bg-blue-lighter shadow rounded-lg text-xl">
    <div class="m-2 capitalize">{{ $thread->title }}</div>
      <div class="w-6/6 flex">
        @if (auth()->check())
          <form method="post" action="/thread/{{ $thread->id }}/favorite" class="flex flex-colpy-1 px-3 no-underline">
              @csrf
              @if (auth()->user()->hasFollowThread($thread))
                  {{ method_field('delete') }}
                  <button class="bg-blue rounded no-underline text-blue-lightest text-sm font-semibold text-center shadow-inner hover:bg-blue-light hover:text-blue-darker py-2 px-2 my-2 mr-2">Ne plus suivre</button>
              @else
                  <button class="bg-blue rounded no-underline text-blue-lightest text-sm font-semibold text-center shadow-inner hover:bg-blue-light hover:text-blue-darker py-2 px-2 my-2 mr-2">Suivre</button>
              @endif
          </form>
          @if ($thread->ownedByAuthUser(auth()->user()) || auth()->user()->role === 1 || auth()->user()->role === 2) 
          <div class="flex">
            <a href="/thread/{{ $thread->id }}/update" class="bg-orange rounded no-underline text-orange-lightest text-sm font-semibold text-center shadow-inner hover:bg-orange-light hover:text-orange-darker py-2 px-2 my-2 mr-2">
              Modifier
            </a> 
            <form method="post" action="/thread/{{ $thread->id }}/delete" id="form-confirmed">
              @csrf
              {{ method_field('DELETE') }}
              <input name="thread_id" value="{{ $thread->id }}" type="hidden">
              <input name="channel_id" value="{{ $thread->channel_id }}" type="hidden">
              <button type="submit" class="bg-red rounded no-underline text-red-lightest text-sm font-semibold text-center shadow-inner hover:bg-red-light hover:text-red-darker py-2 px-2 my-2 mr-2">
                Supprimer
              </button> 
            </form> 
          </div>
          @endif
      </div>
    @endif
  </div>

</div>
  <div class="text-blue-darker font-semibold p-4 py-4 mt-2 shadow bg-blue-lighter rounded-lg">
    <div class="text-sm p-4">{{ $thread->body }}</div>
    <div class="mt-8 mr-32 border-t-2 border-blue-darker">
      <a href="/user/{{ $thread->user->id }}-{{ $thread->user->name }}" class="text-blue px-1 text-sm w-1/3 pr-4">{{ $thread->user->name }}</a>
    </div>
  </div>

@foreach ($thread->replies as $reply)
  <div class="flex flex-col mt-4 p-4 rounded shadow-inner text-sm text-blue-dark bg-white hover:bg-blue-lighter">
    {{ $reply->body }}
    @if (auth()->check())
      @if ($reply->ownedByAuthUser(auth()->user()) || auth()->user()->role === 1) 
      <div class="flex flex-wrap justify-end">
        <a href="/thread/{{ $thread->id }}/reply/{{ $reply->id }}/update" class="bg-blue hover:bg-blue-light mx-2 text-white h-6 p-1 border-b-2 border-blue-dark hover:border-blue rounded no-underline">
          Modifier
        </a> 
        <form method="post" action="/thread/{{ $thread->id }}/reply/{{ $reply->id }}/delete" id="form-confirmed">
          @csrf
          {{ method_field('DELETE') }}
          <input name="thread_id" value="{{ $thread->id }}" type="hidden">
          <input name="channel_id" value="{{ $thread->channel_id }}" type="hidden">
          <button type="submit" class="bg-red hover:bg-red-light mx-2 text-white h-6 p-1 border-b-2 border-red-dark hover:border-red rounded no-underline">
            Supprimer
          </button> 
        </form> 
      </div>
      @endif
    @endif
  </div>
@endforeach
{{ $thread->replies()->paginate(10) }}

<form method="post" class="w-full mb-16 mt-8">
    @csrf

    <div class="flex flex-col items-center">
        <textarea name="body" class="h-64 mt-8 w-full p-8" id="body" rows="6" placeholder="Content" required>{{ old('body') }}</textarea>
    </div>
        <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded mt-4">Répondre</button>
</form>
@endsection