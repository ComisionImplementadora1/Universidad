<?php

namespace App\Http\Controllers\Alumno\Auth;

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
        return $request->user('alumno')->hasVerifiedEmail()
                    ? redirect()->intended(route('alumno.dashboard'))
                    : view('alumno.auth.verify-email');
    }
}
