<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Models\User;
use App\Services\UserService;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserServiceTest extends TestCase
{
   use RefreshDatabase;

   protected UserService $userService;

   protected function setUp(): void
   {
       parent::setUp();
       $this->userService = new UserService(new UserRepository());
   }

   public function test_list_all_users()
   {
        User::factory()->count(3)->create();
        $users = $this->userService->getAllUsers();
        $this->assertCount(3, $users);
   }

   public function test_create_user_through_service()
   {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johdoe@example.com',
            'password' => 'password123',
        ];
        $user = $this->userService->createUser($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($userData['name'], $user->name);
   }

   public function test_update_user_with_password()
   {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'),
        ]);

        $updatedData = $this->userService->updateUser($user->id, [
            'name' => 'Updated Name',
            'email' => $user->email,
            'password' => 'newpassword',
        ]);

        $this->assertEquals($updatedData['name'], $updatedData->name);
        $this->assertTrue(Hash::check('newpassword', $updatedData->password));
    }

    public function test_update_user_without_password()
    {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'),
        ]);

        $updatedData = $this->userService->updateUser($user->id, [
            'name' => 'Updated Name',
            'email' => $user->email,
        ]);

        $this->assertEquals($updatedData['name'], $updatedData->name);
        $this->assertTrue(Hash::check('oldpassword', $updatedData->password));
    }
}
