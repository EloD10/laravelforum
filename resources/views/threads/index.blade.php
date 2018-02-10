@extends('layouts.app')

@section('content')
<div class="container" role="main">
    <div class="display-4">Forum</div>
    @foreach ($threads as $thread)
    <div class="card" style="margin: 1em;">
        <div class="card-body">
                <div class="card-title">
                        <h5 class="d-flex justify-content-start">
                            <a href="{{$thread->path() }}">
                                {{$thread->title }}
                            </a>
                            <span class="badge badge-light">
                                {{ str_plural('comment', $thread->replies_count) }} {{ $thread->replies_count }}
                            </span>
                        </h5>
                </div>
                <div class="card-text">
                    <span>
                        {{ $thread->body }}
                     </span>
                    <p class="card-text" style="margin-top: 20px;"><small class="text-muted">This thread was last updated at {{ $thread->updated_at->diffForHumans() }}</small></p>

                </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

