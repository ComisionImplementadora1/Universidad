<?php

namespace Tests\Feature;

use App\Models\Alumno;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class AlumnoPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('alumno/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $alumno = Alumno::factory()->create();

        $response = $this->post('alumno/forgot-password', [
            'email' => $alumno->email,
        ]);

        Notification::assertSentTo($alumno, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $alumno = Alumno::factory()->create();

        $response = $this->post('alumno/forgot-password', [
            'email' => $alumno->email,
        ]);

        Notification::assertSentTo($alumno, ResetPassword::class, function ($notification) {
            $response = $this->get('alumno/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $alumno = Alumno::factory()->create();

        $response = $this->post('alumno/forgot-password', [
            'email' => $alumno->email,
        ]);

        Notification::assertSentTo($alumno, ResetPassword::class, function ($notification) use ($alumno) {
            $response = $this->post('alumno/reset-password', [
                'token' => $notification->token,
                'email' => $alumno->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
