@extends('layouts.app')

@section('content')
<div class="container" role="main">
    <div class="display-4">Forum</div>
    <div class="card">
        @foreach ($threads as $thread)
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{$thread->path() }}">
                        {{$thread->title }}
                    </a>
                </h5>
                <p class="card-text">{{ $thread->body }}</p>
            </div>
            <hr>
        @endforeach
    </div>
</div>
@endsection

