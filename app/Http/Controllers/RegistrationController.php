<?php

    namespace App\Http\Controllers;

    use App\User;
    use App\Mail\Welcome;
    use Illuminate\Support\Facades\Hash;

    class RegistrationController extends Controller
    {
        public function __construct()
        {
            $this->middleware('guest');
        }

        public function create()
        {
            return view('registration.create');
        }

        public function store(){
            //validate the data
            try {
                $this->validate(request(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|confirmed'
                ]);
            } catch (ValidationException $e) {
            }

            //create the user
            $user = User::create(array_merge(request(['name', 'email']), [
                'password' => Hash::make(request('password'))
            ]));

            //sign him in
            auth()->login($user);

            //sending welcome email
            \Mail::to($user)->send(new Welcome($user));

            //redirect him to the home page
            return redirect()->home();
        }
    }
