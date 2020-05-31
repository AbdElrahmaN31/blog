<?php

    namespace App\Http\Controllers;

    use App\Post;

    class PostsController extends Controller
    {
        public function index()
        {
            return view('posts.index');
        }

        public function show()
        {
            return view('posts.show');
        }

        public function create()
        {
            return view('posts.create');
        }

        public function store()
        {
            /*
            //Create a new post using the request data
            $post = new Post();
            $post->body = request('title');
            $post->title = request('body');

            //save it to database
            $post->save();
            */

            // The above code is equal to
            Post::create([
                'title' => request('title'),
                'body' => request('body')
            ]);

            //and then redirect to the home page
            return redirect('/');

        }
    }
