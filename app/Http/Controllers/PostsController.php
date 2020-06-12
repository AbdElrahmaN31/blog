<?php

    namespace App\Http\Controllers;

    use App\Post;
    use Carbon\Carbon;

    class PostsController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth')->except(['index', 'show']);
        }

        public function index()
        {

            $posts = Post::latest()
                ->filter(request(['month','year']))
                ->get();

            //Temporary.
            $archives = Post::selectRaw('year(created_at) As year, monthname(created_at) As month,count(*) AS Published')
                ->groupBy('year','month')
                ->orderByRaw('min(created_at) desc')
                ->get()
                ->toArray();

            return view('posts.index', compact('posts','archives'));
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
                new Post(request(['title','body']))
            );

            //and then redirect to the home page
            return redirect('/');
        }
    }
