<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Auth;

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
            ]);
        }

        public function destroy()
        {
            auth()->logout();
            return redirect()->home();
        }
    }
