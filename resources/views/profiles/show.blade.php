@extends('layouts.app')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            Profile of {{ $profileUser->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            Profile created since {{ $profileUser->created_at->diffForHumans()  }}
            <small class="d-block">{{ $profileUser->created_at }}</small>
        </div>
    </div>

    <div class="mx-auto" style="width: 500px;">
        @foreach($threads as $thread)
                <div class="card text-center mt-4">
                    <div class="card-header">
                        <a href="#"> {{ $thread->creator->name }}</a> posted :
                        <strong>{{$thread->title }}</strong>
                    </div>
                    <div class="card-body">
                            <span>
                                {{ $thread->body }}
                            </span>
                    </div>
                </div>
        @endforeach
        {{ $threads->links() }}
    </div>
@endsection