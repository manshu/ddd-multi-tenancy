<?php


namespace Gurulabs\Http\Authentication\Controllers;

use Illuminate\Http\Request;
use Gurulabs\Domain\Users\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Gurulabs\App\Controllers\Controller;
use Gurulabs\App\Providers\RouteServiceProvider;
use Gurulabs\Http\Authentication\Requests\RegistrationRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegistrationRequest $request)
    {
        // return redirect('/login');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/login');
    }
}
