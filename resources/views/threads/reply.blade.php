<div class="card" style="margin: 1em;">
    <div class="card-header">
        <h5>
            <a href="#">
                {{ $reply->owner->name }}
            </a>
            said {{ $reply->created_at->diffForHumans() }}...
        </h5>
        @if (auth()->check())
            <div class="media pt-3">
                <img alt="32x32" class="mr-2 rounded" style="width: 64px; height: 64px;" src="{{ asset('img/img_profile_min.png') }}">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    {{ $reply->body }}
                </p>
                <footer>
                <form class="" method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}
                    <span class="badge badge-secondary">{{ $reply->favorites()->count() }}</span>
                    <button type="submit" class="btn btn-outline-dark" {{ $reply->isFavorited() ? 'disabled' : '' }}>{{ str_plural('Favorite', $reply->favorites()->count()) }}</button>
                </form>
                </footer>
            </div>
        @else
            <div class="media text-muted pt-3">
                <img alt="32x32" class="mr-2 rounded" style="width: 64px; height: 64px;" src="{{ asset('img/img_profile_min.png') }}">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">{{ $reply->owner->name }}</strong> said {{ $reply->created_at->diffForHumans() }}...
                    {{ $reply->body }}
                </p>
                <div>
                    {{ csrf_field() }}
                    {{ $reply->favorites()->count() }}
                    <a href="{{ route('login') }}" class="badge badge-light">
                        <button class="btn btn-default">{{ str_plural('Favorite', $reply->favorites()->count()) }}</button>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>