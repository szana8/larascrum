<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Notifications\SignupActivate;
use Illuminate\Foundation\Testing\WithFaker;
use \Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignUpTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	function a_user_can_be_sign_up_with_an_api_endpoint()
	{
		Notification::fake();

		$response = $this->post(route('signup'), [
			'name' => 'Test User',
			'email' => 'test@user.com',
			'password' => 'foobar',
			'password_confirmation' => 'foobar'
		]);

		$response->assertSuccessful();

		Notification::assertSentTo(
			[\App\User::whereName('Test User')->first()],
			SignupActivate::class
		);
	}

	/** @test */
	function a_user_can_not_sign_up_without_a_name()
	{
		$response = $this->post(route('signup'), [
			'email' => 'without_name@user.com',
			'password' => 'foobar',
			'password_confirmation' => 'foobar'
		]);

		$response->assertStatus(302);
	}

	/** @test */
	function a_user_can_not_sign_up_without_an_email()
	{
		$response = $this->post(route('signup'), [
			'name' => 'without email',
			'password' => 'foobar',
			'password_confirmation' => 'foobar'
		]);

		$response->assertStatus(302);
	}

	/** @test */
	function a_user_can_not_sign_up_without_a_password()
	{
		$response = $this->post(route('signup'), [
			'name' => 'without password',
			'email' => 'withoutpassword@password.com',
		]);

		$response->assertStatus(302);
	}

	/** @test */
	function a_user_can_not_sign_up_when_the_password_and_the_password_confirmation_does_not_match()
	{
		$response = $this->post(route('signup'), [
			'name' => 'Not match',
			'email' => 'not_match@password.com',
			'password' => 'not',
			'password_confirmation' => 'match'
		]);

		$response->assertStatus(302);
	}
}
