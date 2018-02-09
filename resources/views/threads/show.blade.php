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
        <div class="card card-default">
            <div class="card-header">Write a response</div>
            
            <div class="card-body">
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
        </div>

</div>

@endsection
