<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_users_list_page_shows_users()
    {
        User::factory()->count(5)->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Users List');
    }

    public function test_create_user_via_post_request()
    {
        $userData = [
            'name' => 'Feature Test User',
            'email' => 'feature@example.com',
            'password' => 'password',
        ];

        $response = $this->post(route('users.store'), $userData);
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'feature@example.com']);
    }

    public function test_update_user()
    {
        $user = User::factory()->create();

       
        $response = $this->put(route('users.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
            'password' => 'newpassword',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
