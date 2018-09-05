@extends('layout')

@section('content')

    <h1>Liste des utilisateurs</h1>

    <div class="flex flex-wrap bg-grey-lighter">
    @foreach ($users as $user)
    <div class="bg-white w-full mx-auto max-w-sm shadow-lg rounded-lg overflow-hidden my-4">
        <div class="sm:flex sm:items-center px-6 py-4">
            @if( isset($user->background))
            <img class=" rounded-full" src="/storage/{{ $user->avatar }}" alt="avatar">
            @else
            <svg class="block h-16 sm:h-24 rounded-full mx-auto mb-4 sm:mb-0 sm:mr-4 sm:ml-0 bg-blue-light fill-current text-blue-darker" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
            @endif
            <div class="text-center sm:text-left sm:flex-grow">
            <div class="mb-4">
                <p class="text-xl leading-tight">{{ $user->name }}</p>
                <p class="text-sm leading-tight text-grey-dark">{{ $user->email }}</p>
            </div>
            <div>
                <a href="/user/{{ $user->id }}-{{ $user->name }}" class="text-xs font-semibold rounded-full px-4 py-1 leading-normal bg-white no-underline border border-blue text-blue hover:bg-blue hover:text-white">Voir profile</a>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>

    
@endsection