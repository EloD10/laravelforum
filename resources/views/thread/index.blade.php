@extends('layout')

@section('content')

<div class="flex flex-col">
@foreach ($threads as $thread)
    <div class="shadox">{{ $thread->id }}</div>

@endforeach
    {{ $threads->links() }}
</div>

@endsection