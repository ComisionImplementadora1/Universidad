<?php

namespace App\Http\Controllers\Docente\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated docente's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('docente')->hasVerifiedEmail()) {
            return redirect()->intended(route('docente.dashboard').'?verified=1');
        }

        if ($request->user('docente')->markEmailAsVerified()) {
            event(new Verified($request->user('docente')));
        }

        return redirect()->intended(route('docente.dashboard').'?verified=1');
    }
}
