@extends('layouts.app')

@section('content')
    <!-- Thread -->
    <div class="container">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="#"> {{ $thread->creator->name }}</a> posted :
                        <strong>{{$thread->title }}</strong>
                    </h5>
                    <p class="card-text">
                        {{ $thread->body }}
                    </p>
                </div>
        </div>
    </div>

    <!-- Replies -->
    <div class="container">
        @foreach ($replies as $reply)
            @include('threads.reply')
        @endforeach

        {{ $replies->links() }}



     <!-- Write a reply -->
        @if (auth()->check())
            <form method="POST" action="{{ $thread->path() . '/replies' }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" class="form-control" rows="3" placeholder="Submit a reply"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">sign in</a> for submit replies</p>
        @endif

    </div>


@endsection
