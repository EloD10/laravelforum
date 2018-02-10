@extends('layouts.app')

@section('content')
<div class="container" role="main">
    <div class="display-4">Forum</div>

    <div class="card card-default">
        @foreach ($threads as $thread)
            <div class="card-header">
                    <a href="{{$thread->path() }}">
                        {{$thread->title }}
                    </a>
            </div>
            <div class="card-body">
                <p>
                    {{ $thread->body }}
                 </p>
            </div>
            <hr>
        @endforeach
    </div>
</div>
@endsection

