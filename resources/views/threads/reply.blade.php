<div class="card" style="margin: 1em;">
    <h5 class="card-header">
        <a href="#">
            {{ $reply->owner->name }}
        </a>
        said {{ $reply->created_at->diffForHumans() }}...
    </h5>

    <div class="card-body">
        <p class="card-text">
            {{ $reply->body }}
        </p>
    </div>
</div>