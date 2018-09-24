<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class SignInTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_can_activate_themselfs()
    {
        $this->post(route('signup'), [
            'name' => 'Test User Sign In',
			'email' => 'testsignin@user.com',
			'password' => 'foobar',
			'password_confirmation' => 'foobar'
        ]);

        $user = User::whereName('Test User Sign In')->first();
        $response = $this->get(url("/api/auth/signup/activate/$user->activation_token"));

        $response->assertSuccessful();
    }

    /** @test */
    function an_activated_user_can_sign_in()
    {
        $this->artisan('passport:install');

        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure(['access_token', 'token_type', 'expires_at']);
    }

    /** @test */
    function an_inactive_user_can_not_sign_in()
    {
        $user = create(User::class, ['active' => false]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    function a_user_can_not_sign_in_without_an_email()
    {
        create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    function a_user_can_not_sign_in_without_a_password()
    {
        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    function a_user_can_not_sign_in_with_invalid_password()
    {
        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secrets'
        ]);

        $response->assertStatus(401);
    }
}
