<?php

namespace App\Http\Controllers\Administrador\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return $request->user('administrador')->hasVerifiedEmail()
                    ? redirect()->intended(route('administrador.dashboard'))
                    : view('administrador.auth.verify-email');
    }
}
