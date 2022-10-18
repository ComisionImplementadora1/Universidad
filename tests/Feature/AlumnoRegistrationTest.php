<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumnoRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('alumno/register');

        $response->assertStatus(200);
    }

    public function test_new_alumnos_can_register()
    {
        $response = $this->post('alumno/register', [
            'name' => 'Test Alumno',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('alumno');
        $response->assertRedirect(route('alumno.dashboard'));
    }
}
