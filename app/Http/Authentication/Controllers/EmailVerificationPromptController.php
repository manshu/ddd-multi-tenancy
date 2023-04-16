<?php


namespace Gurulabs\Http\Authentication\Controllers;

use Illuminate\Http\Request;
use Gurulabs\App\Controllers\Controller;
use Gurulabs\App\Providers\RouteServiceProvider;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : view('backend.auth.verify-email');
    }
}
