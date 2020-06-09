<?php

    namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Request;

    class SessionsController extends Controller
    {

        public function __construct()
        {
            $this->middleware('guest', ['except' => 'destroy']);
        }

        public function create()
        {
            return view('sessions.create');
        }

        public function store()
        {
            $credentials = [
              'email' => request('email'),
              'password' => request('password')
            ];

            if (Auth::attempt($credentials))
                return redirect()->home();

            return back()->withErrors([
                'message' => 'Please check your credentials and try again',
                'email' => request('email'),
                'password' => request('password')
            ]);

            /*
            - Attempt to authenticate the user
            - If not, redirect him back.
            - If so, sign him in
            - redirect to the home page
            */


           /* $user = new User([
                'email' => request('email'),
                'password' => request('password')]);
            if (Auth::login($user))
            {
                redirect()->home();
            }
            return back()->withErrors([
                'message' => 'Please check your credentials and try again',
                'email' => request('email'),
                'password' => request('password')
            ]);*/

        }

        public function destroy()
        {
            auth()->logout();
            return redirect()->home();
        }
    }
