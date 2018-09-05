@extends('layout')

@section('content')

@include('user.dashboard.dashboard-menu')

<div class="px-8">
    @foreach ($wallMessages as $wallMessage)
    <div class="flex flex-col bg-white shadow-md rounded p-2 my-4">
        {{ $wallMessage->body }}
    </div>
    @endforeach
</div>

@endsection