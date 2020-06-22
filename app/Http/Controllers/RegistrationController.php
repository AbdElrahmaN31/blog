<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\RegistrationForm;
    use App\Mail\Welcome;
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

        public function store(RegistrationForm $form)
        {

           $form->persist();

            //redirect him to the home page
            return redirect()->home();
        }
    }
