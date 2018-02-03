@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                            {{$thread->title }}
                    </h5>
                    <p class="card-text">
                        {{ $thread->body }}
                    </p>
                </div>
        </div>
    </div>

    @foreach ($thread->replies as $reply)
    <div class="container">
        <div class="card" style="margin: 1em;">
            <h5 class="card-header">
                <a href="#">
                    {{ $reply->owner->name }}
                </a>
                said {{ $reply->created_at->diffForHumans() }}...
            </h5>

            <div class="card-body">
                <p class="card-text">
                    {{ $reply->body }}
                </p>
            </div>
        </div>
    </div>
    @endforeach

@endsection
