<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'jhone doe',
            'email' => 'jhone@gmail.com'
        ]);
        $user2 = User::make([
            'name' => 'dary',
            'email' => 'dary@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }
    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();
        $user = User::first();
        if($user)
        {
            $user->delete();
        }
        $this->assertTrue(true);
    }
    public function test_database()
    {
        $this->assertDatabaseHas('users',[
            'name' => 'deepak'
        ]);
    }
    public function test_if_seeders_works()
    {
        $this->seed();
    }
   
}
