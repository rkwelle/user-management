<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected UserRepository $userRepository;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepository();
    }

    public function test_create_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $user = $this->userRepository->createUser($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertTrue(password_verify($data['password'], $user->password));
    }

    public function test_get_all_users()
    {
        User::factory()->count(3)->create();

        $users = $this->userRepository->getAllUsers();

        $this->assertCount(3, $users);
        $this->assertInstanceOf(User::class, $users[0]);
    }
}
