<ul class="list-group">
    @foreach($post->comments as $comment)
        <li class="list-group-item">
            <a href="#">{{$comment->user->name}}</a>
            <strong>
                {{ $comment->created_at->diffForHumans() }}: &nbsp;
            </strong>
            {{$comment->body}}
        </li>
    @endforeach
</ul>
