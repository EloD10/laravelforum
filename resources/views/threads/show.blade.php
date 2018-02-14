@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Thread -->
    <div class="row">
        <div class="col-8">
            <div class="card card-default">
               <div class="card-header">
                        <a href="{{route('profile', $thread->creator) }}"> {{ $thread->creator->name }}</a> posted :
                        <strong>{{$thread->title }}</strong>
                    </div>
                    <div class="card-body">
                        <span>
                            {{ $thread->body }}
                        </span>
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
        <div class="col-4">
            <div class="card bg-light mb-3">
                <div class="card-body">
                        <p>
                            This thread was published <strong>{{ $thread->created_at->diffForHumans() }}</strong> by
                            <a href="#">{{ $thread->creator->name }}</a> and currently has <strong>{{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}</strong>.
                        </p>
                        <p>This thread was last updated at <strong>{{ $thread->updated_at->diffForHumans() }}</strong></p>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
