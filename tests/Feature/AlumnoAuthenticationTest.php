<?php

namespace Tests\Feature;

use App\Models\Alumno;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumnoAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('alumno/login');

        $response->assertStatus(200);
    }

    public function test_alumnos_can_authenticate_using_the_login_screen()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->post('alumno/login', [
            'email' => $alumno->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('alumno');
        $response->assertRedirect(route('alumno.dashboard'));
    }

    public function test_alumnos_can_not_authenticate_with_invalid_password()
    {
        $alumno = Alumno::factory()->create();

        $this->post('alumno/login', [
            'email' => $alumno->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('alumno');
    }
}
