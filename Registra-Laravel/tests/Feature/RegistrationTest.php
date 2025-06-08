<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_registration_page_loads_successfully()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('registration.index');
    }

    public function test_registration_form_validation()
    {
        $response = $this->post('/register', [
            'full_name' => '',
            'user_name' => '',
            'email' => 'invalid-email',
            'phone' => '123',
            'whatsapp' => '123',
            'address' => '',
            'password' => 'weak',
            'password_confirmation' => 'different',
        ]);

        $response->assertSessionHasErrors([
            'full_name',
            'user_name',
            'email',
            'phone',
            'whatsapp',
            'address',
            'password',
        ]);
    }

    public function test_successful_user_registration()
    {
        // Create a fake image file
        $file = UploadedFile::fake()->create('avatar.jpg', 100, 'image/jpeg');

        $userData = [
            'full_name' => 'John Doe',
            'user_name' => 'johndoe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'whatsapp' => '1234567890',
            'address' => '123 Main St',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'user_image' => $file,
        ];

        $response = $this->post('/register', $userData);

        $response->assertRedirect(route('registration.success'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'full_name' => 'John Doe',
            'user_name' => 'johndoe',
            'email' => 'john@example.com',
        ]);

        // Get the user from database to check the image path
        $user = User::where('email', 'john@example.com')->first();
        $this->assertNotNull($user, 'User was not created');

        // Check if the file exists in storage
        $this->assertTrue(
            Storage::disk('public')->exists('uploads/' . $user->user_image),
            'The uploaded file was not found in storage. Expected path: uploads/' . $user->user_image
        );
    }

    public function test_username_uniqueness_validation()
    {
        // Create a user first
        User::create([
            'full_name' => 'Existing User',
            'user_name' => 'existinguser',
            'email' => 'existing@example.com',
            'phone' => '1234567890',
            'whatsapp' => '1234567890',
            'address' => '123 Main St',
            'password' => bcrypt('password'),
            'user_image' => 'default.jpg',
        ]);

        // Try to register with same username
        $response = $this->post('/register', [
            'full_name' => 'New User',
            'user_name' => 'existinguser', // Same username
            'email' => 'new@example.com',
            'phone' => '0987654321',
            'whatsapp' => '0987654321',
            'address' => '456 New St',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'user_image' => UploadedFile::fake()->create('test.jpg', 100, 'image/jpeg'),
        ]);

        $response->assertSessionHasErrors('user_name');
    }

    public function test_password_encryption()
    {
        $password = 'SecurePass123!';

        $response = $this->post('/register', [
            'full_name' => 'Test User',
            'user_name' => 'testuser',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'whatsapp' => '1234567890',
            'address' => '123 Test St',
            'password' => $password,
            'password_confirmation' => $password,
            'user_image' => UploadedFile::fake()->create('test.jpg', 100, 'image/jpeg'),
        ]);

        $user = User::where('email', 'test@example.com')->first();

        $this->assertNotNull($user, 'User was not created successfully');
        $this->assertNotEquals($password, $user->password, 'Password was not encrypted');
        $this->assertTrue(password_verify($password, $user->password), 'Password verification failed');
    }
}
