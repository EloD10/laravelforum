@extends('layout')

@section('content')

    <form method="post" class="container">
        @csrf

        <div class="flex flex-col items-center">
            {{-- <div class="text-grey-darker text-center bg-grey-light w-2/3 h-8  mt-8">
                <div class="flex relative">
                    <select name="channel_id" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1" >Really long option that will likely overlap the chevron</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div> --}}
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