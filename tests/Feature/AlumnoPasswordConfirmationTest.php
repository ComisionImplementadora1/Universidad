<?php

namespace Tests\Feature;

use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumnoPasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->actingAs($alumno, 'alumno')->get('alumno/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->actingAs($alumno, 'alumno')->post('alumno/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->actingAs($alumno, 'alumno')->post('alumno/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
