<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="{{ '/posts/' . $post->id }}"> {{ $post->title }}</a>
    </h2>
    <p class="blog-post-meta">
        <a href="#">{{$post->user->name}}</a> from
        {{ $post->created_at->diffForHumans() }}
    </p>
    <p>{{$post->body}}</p>
</div>
