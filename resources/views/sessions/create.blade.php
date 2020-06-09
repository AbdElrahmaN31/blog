@extends('layouts.master');

@section('content')
    <div class="col-sm-8">
        <h1>Sign In</h1>

        <hr/>

        <form method="Post" action="/login">
            @csrf

            @include('layouts.errors')

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit">Sign In</button>
            </div>
        </form>

    </div>
@endsection
