<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SignInTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        Notification::fake();
    }

    /** @test */
    public function users_can_activate_themselfs()
    {
        $this->post(route('signup'), [
            'name'                  => 'Test User Sign In',
            'email'                 => 'testsignin@user.com',
            'password'              => 'foobar',
            'password_confirmation' => 'foobar',
        ]);

        $user = User::whereName('Test User Sign In')->first();
        $response = $this->get(url("/api/auth/signup/activate/$user->activation_token"));

        $response->assertSuccessful();
    }

    /** @test */
    public function an_activated_user_can_sign_in()
    {
        Notification::fake();
        $this->artisan('passport:install');

        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'secret',
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure(['access_token', 'token_type', 'expires_at']);
    }

    /** @test */
    public function an_inactive_user_can_not_sign_in()
    {
        $user = create(User::class, ['active' => false]);

        $response = $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'secret',
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function a_user_can_not_sign_in_without_an_email()
    {
        create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'password' => 'secret',
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_not_sign_in_without_a_password()
    {
        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_not_sign_in_with_invalid_password()
    {
        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'secrets',
        ]);

        $response->assertStatus(401);
    }
}
