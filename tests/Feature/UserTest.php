<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_name_field_is_required_to_create_user()
    {
        $this->postJson(route('user.store'))
            ->assertSee("The name field is required");
    }

    public function test_email_field_is_required_to_create_user()
    {
        $this->postJson(route('user.store'))
            ->assertSee("The email field is required");
    }

    public function test_email_field_must_unique_to_create_user()
    {
        $user = \UserMaker::create();

        $this->postJson(route('user.store'), [
            'email' => $user->email,
        ])->assertSee("The email has already been taken");
    }

    public function test_password_field_is_required_to_create_user()
    {
        $this->postJson(route('user.store'))
            ->assertSee("The password field is required");
    }

    public function test_password_must_confirmed_to_create_user()
    {
        $this->postJson(route('user.store'), [
            'password' => 'password',
        ])->assertSee("The password confirmation does not match");
    }

    public function test_user_will_created()
    {
        $this->postJson(route('user.store'), [
            'name' => $name = $this->faker->name,
            'email' => $email = $this->faker->email,
            'password' => 'pass',
            'password_confirmation' => 'pass',
        ])->assertJson(['status' => 200]);

        self::assertCount(1, User::all());

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
        ]);

        self::assertTrue(Hash::check('pass', User::query()->first()->password));
    }

    public function test_name_field_is_required_to_update_user()
    {
        $user = \UserMaker::create();

        $this->patchJson(route('user.update', $user))
            ->assertSee("The name field is required");
    }

    public function test_email_field_is_required_to_update_user()
    {
        $user = \UserMaker::create();

        $this->patchJson(route('user.update', $user))
            ->assertSee("The email field is required");
    }

    public function test_email_field_must_unique_to_update_user()
    {
        $user1 = \UserMaker::create();
        $user2 = \UserMaker::create();

        $this->patchJson(route('user.update', $user1), [
            'email' => $user2->email,
        ])->assertSee("The email has already been taken");
    }

    public function test_user_will_updated()
    {
        $user = \UserMaker::create();

        $this->patchJson(route('user.update', $user), [
            'name' => $name = $this->faker->name,
            'email' => $email = $this->faker->email,
        ])->assertJson(['status' => 200]);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function test_user_will_deleted()
    {
        $user = \UserMaker::create();

        $this->deleteJson(route('user.destroy', $user))
            ->assertJson(['status' => 200]);

        $this->assertSoftDeleted($user->fresh());
    }
}
