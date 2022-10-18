<?php

namespace App\Http\Controllers\Docente\Auth;

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
        return $request->user('docente')->hasVerifiedEmail()
                    ? redirect()->intended(route('docente.dashboard'))
                    : view('docente.auth.verify-email');
    }
}
