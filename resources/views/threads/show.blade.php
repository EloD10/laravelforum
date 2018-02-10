@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Thread -->
    <div class="card card-default">
           <div class="card-header">
                <h5>
                    <a href="#"> {{ $thread->creator->name }}</a> posted :
                    <strong>{{$thread->title }}</strong>
                </h5>
                </div>
                <div class="card-body">
                    <p>
                        {{ $thread->body }}
                    </p>
                </div>
        </div>

    <!-- Replies -->
        @foreach ($replies as $reply)
            @include('threads.reply')
        @endforeach

        {{ $replies->links() }}


     <!-- Write a reply -->
        @if (auth()->check())
        <hr>
        <div class="form-group">
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" class="form-control" rows="3" placeholder="Write a response"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @else
                    <div class="breadcrumb" style="margin: 1em;">
                        <span>Please <a href="{{ route('login') }}">sign in</a> for submit replies</span>
                    </div>
                @endif

        </div>

</div>

@endsection
