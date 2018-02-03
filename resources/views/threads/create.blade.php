@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <form method="POST" action="/threads">
                {{ csrf_field() }}
                <input name="title" type="text" class="form-control" id="title" placeholder="Title">
                <div class="form-group" style="margin-top: 5px">
                    <textarea name="body" class="form-control" id="body" rows="8" placeholder="Content"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Published</button>
            </form>
        </div>
    </div>


@endsection