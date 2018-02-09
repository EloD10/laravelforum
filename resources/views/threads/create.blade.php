@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Create your Thread</div>
            
            <div class="card-body">
                <form method="POST" action="/threads">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <select name="channel_id" class="form-control" required>
                            <option value="">Choose your channel</option>
                        @foreach($channels as $channel)
                                <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : ''}}>
                                    {{ $channel->name }}
                                </option>
                        @endforeach
                        </select>
                    </div>

                    <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}" required>
                    <div class="form-group" style="margin-top: 5px">
                        <textarea name="body" class="form-control" id="body" rows="8" placeholder="Content" required>{{ old('body') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin: 5px;">Published</button>

                    @if (count($errors))
                        @foreach( $errors->all() as $error)
                            <div class="alert alert-danger" role="alert" style="margin: 5px;">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>


@endsection