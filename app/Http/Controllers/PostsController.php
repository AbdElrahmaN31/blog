<?php

    namespace App\Http\Controllers;

    use App\Post;
    use App\Repositories\Posts;

    class PostsController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth')->except(['index', 'show']);
        }

        public function index(Posts $posts)
        {
            $posts = $posts->all();


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

            auth()->user()->publish(
                new Post(request(['title', 'body']))
            );

            //and then redirect to the home page
            return redirect('/');
        }
    }
