<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocenteRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('docente/register');

        $response->assertStatus(200);
    }

    public function test_new_docentes_can_register()
    {
        $response = $this->post('docente/register', [
            'name' => 'Test Docente',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('docente');
        $response->assertRedirect(route('docente.dashboard'));
    }
}
