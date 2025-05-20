<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_registration()
    {
        Storage::fake('public');

        $response = $this->post(route('registration.submit'), [
            'full_name' => 'Test User',
            'user_name' => 'testuser',
            'email' => 'test@example.com',
            'phone' => '0123456789',
            'whatsapp' => '20123456789',
            'address' => 'Test Address',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'user_image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $response->assertRedirect(route('registration.success'))
                ->assertSessionHas('success');

        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }
}
