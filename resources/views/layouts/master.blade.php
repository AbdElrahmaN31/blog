<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>

@include('layouts.nav')

@if($flash = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
@endif

<div class="container">
    <div class="row">

        @yield('content')

        @include('layouts.sidebar')

    </div><!-- /.row -->
</div><!-- /.container -->

@include('layouts.footer')
</body>
</html>
