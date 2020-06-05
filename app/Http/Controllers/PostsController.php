<?php

    namespace App\Http\Controllers;

    use App\Post;

    class PostsController extends Controller
    {
        public function index()
        {
            $posts = Post::latest()->get();

            return view('posts.index', compact('posts'));
        }

        public function show(Post $post)
        {
            return view('posts.show', compact('post'));
            /*
            //OR we can use this way and receive the $id as parameter
             $post = Post::find($id);
            */
        }

        public function create()
        {
            return view('posts.create');
        }

        public function store()
        {
            // Add some of server side validation
            $this->validate(request(), [
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
