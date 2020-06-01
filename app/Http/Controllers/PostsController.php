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
            // Add some of server side validation
            $this . $this->validate(request(),[
                    'title' => 'required',
                    'body' => 'required'
                ]
            );

            Post::create([
                'title' => request('title'),
                'body' => request('body')
            ]);

            //and then redirect to the home page
            return redirect('/');
            /*
             * ANOTHER way to create a post
             *
            //Create a new post using the request data
            $post = new Post();
            $post->body = request('title');
            $post->title = request('body');

            //save it to database
            $post->save();
            */

        }
    }
