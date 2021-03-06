@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Publish a post</h1>

        <hr/>

        <form method="POST" action="/posts">
            @csrf


            @include('layouts.errors')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea type="text" class="form-control" name="body" id="body" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>

    </div>
@endsection
