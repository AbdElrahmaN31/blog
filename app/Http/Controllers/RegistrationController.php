<?php

    namespace App\Http\Controllers;

    use App\User;
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

            //redirect him to the home page
            return redirect()->home();
        }
    }
