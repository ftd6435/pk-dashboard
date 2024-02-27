<div class="d-flex mb-4">
    <img src="/img/avatar.jpeg" class="img-fluid" style="width: 45px; height: 45px;">
    <div class="ps-3">
        <h6><a href="">{{ $comment->name }}</a> <small><i>{{ $comment->shortDateFormat($comment->created_at) }}</i></small></h6>
        <p>{{ $comment->content }}</p>
        <button class="btn btn-sm btn-light reply-button" data-comment-id="{{ $comment->id }}">Répondre</button>
    </div>
</div>
@foreach ($comment->responses as $reply)
    <div class="d-flex ms-5 mb-4">
        <img src="/img/avatar.jpeg" class="img-fluid" style="width: 45px; height: 45px;">
        <div class="ps-3">
            <h6><a href="">{{ $reply->name }}</a> <small><i>{{ $reply->shortDateFormat($reply->created_at) }}</i></small></h6>
            <p>{{ $reply->content }}</p>
            <button class="btn btn-sm btn-light reply-button" data-comment-id="{{ $comment->id }}">Répondre</button>
        </div>
    </div>
@endforeach
