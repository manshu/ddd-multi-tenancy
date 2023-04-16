<?php


namespace Gurulabs\Http\Authentication\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Gurulabs\Domain\Users\User;
use Illuminate\Support\Facades\Hash;
use Gurulabs\App\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Gurulabs\App\Providers\RouteServiceProvider;

class ProviderLoginController extends Controller
{

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {

        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            $user = User::firstOrCreate(
                [
                'email' => $socialUser->getEmail()

                ],
                [
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make(Str::random(24)),
                    'provider_id' => $socialUser->getId(),
                    'profile_photo' => $socialUser->getAvatar(),
                    'provider_name' => $provider,
                ]
            );


            auth()->login($user);

            return redirect()->intended(RouteServiceProvider::HOME);


        } catch (\Throwable $th) {
            logger($th);
            return redirect()->route('register');
        }
    }
}
