@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h1 class="blog-post-title"> {{ $post->title }}</h1>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
            <p>{{$post->body}}</p>
        </div>

        <div class="comments">
            <hr/>
            @include('comments.index')
        </div>

        <div class="add-comment">
            <hr/>
            @include('comments.add')
        </div>

    </div>
@endsection
