<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class AlumnoEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $alumno = Alumno::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($alumno, 'alumno')->get('alumno/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $alumno = Alumno::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'alumno.verification.verify',
            now()->addMinutes(60),
            ['id' => $alumno->id, 'hash' => sha1($alumno->email)]
        );

        $response = $this->actingAs($alumno, 'alumno')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($alumno->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('alumno.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $alumno = Alumno::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'alumno.verification.verify',
            now()->addMinutes(60),
            ['id' => $alumno->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($alumno, 'alumno')->get($verificationUrl);

        $this->assertFalse($alumno->fresh()->hasVerifiedEmail());
    }
}
