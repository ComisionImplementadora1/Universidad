<?php

namespace Tests\Feature;

use App\Models\Docente;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocenteAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('docente/login');

        $response->assertStatus(200);
    }

    public function test_docentes_can_authenticate_using_the_login_screen()
    {
        $docente = Docente::factory()->create();

        $response = $this->post('docente/login', [
            'email' => $docente->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('docente');
        $response->assertRedirect(route('docente.dashboard'));
    }

    public function test_docentes_can_not_authenticate_with_invalid_password()
    {
        $docente = Docente::factory()->create();

        $this->post('docente/login', [
            'email' => $docente->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('docente');
    }
}
