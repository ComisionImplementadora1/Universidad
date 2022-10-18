<?php

namespace Tests\Feature;

use App\Models\Docente;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class DocenteEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $docente = Docente::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($docente, 'docente')->get('docente/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $docente = Docente::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'docente.verification.verify',
            now()->addMinutes(60),
            ['id' => $docente->id, 'hash' => sha1($docente->email)]
        );

        $response = $this->actingAs($docente, 'docente')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($docente->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('docente.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $docente = Docente::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'docente.verification.verify',
            now()->addMinutes(60),
            ['id' => $docente->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($docente, 'docente')->get($verificationUrl);

        $this->assertFalse($docente->fresh()->hasVerifiedEmail());
    }
}
