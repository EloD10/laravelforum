@extends('layouts.app')

@section('content')

    <div class="card border-primary box-shadow text-center w-50 mx-auto">
        <div class="card-header">
            <h3 class="mb-0">
               Profile of <strong class="mb-2 text-primary">{{ $profileUser->name }}</strong>
            </h3>
        </div>
        <div class="card-body">
            <!--<strong class="mb-2 text-primary">Title</strong>-->
        <img class="mx-auto mt-2 mb-2 rounded-circle p-1" style="border: solid; border-width: 3px; border-color: #007bff;" alt="Thumbnail [200x250]" width="140" height="140" src="{{ asset('img/img_profile_min.png') }}" >
            <div class="text-muted border-top pt-2">
                Profile created since {{ $profileUser->created_at->diffForHumans()  }}
            <small class="d-block">{{ $profileUser->created_at }}</small>
        </div>
            <!--<p class="card-text mb-auto">Profile description</p>-->
        </div>
    </div>

    <div class="mx-auto w-50">
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
