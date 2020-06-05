<div class="card">
    <div class="card-body">
        <form method="POST" action="/posts/{{$post->id}}/comments">
            @csrf

            @include('layouts.errors')

            <div class="form-group">
                <textarea name="body" placeholder="Your comment here" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add comment</button>
            </div>
        </form>
    </div>
</div>
