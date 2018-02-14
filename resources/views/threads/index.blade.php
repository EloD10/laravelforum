@extends('layouts.app')

@section('content')
<div class="container" role="main">
    @foreach ($threads as $thread)
    <article class="col-md-8">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <!-- <strong class="d-inline-block mb-2 text-success">Channel Name</strong> -->
                <h3 class="mb-0">
                    <a class="text-dark" href="{{$thread->path() }}">{{ $thread->title }}</a>
                </h3>
                <div class="mb-1 text-muted">{{ $thread->updated_at->diffForHumans() }}</div>
                <p class="card-text mb-auto">{{ $thread->body }}</p>
                <footer class="blockquote-footer"> {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}</footer>
            </div>
            <a href="#">
                <img class="card-img-right flex-auto d-none d-md-block" alt="image profile" style="width: 100px; height: 125px;" src="{{ asset('img/img_profile_min.png') }}">
            </a>
        </div>
    </article>
    @endforeach
</div>
@endsection

