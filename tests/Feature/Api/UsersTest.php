<?php

namespace Tests\Feature\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function can_store_a_user() {
        
        $this->postJson(
        
            route('users.store'),
            $this->getUserData()
    
        )->assertStatus(201);
    
        $this->assertEquals(1, User::count());
    
        $user = User::find(1);
        $this->assertEquals('Alberto Rosas E.', $user->name);
        $this->assertEquals('alberto.rsesc@protonmail.com', $user->email);
        $this->assertEquals('admin', $user->role);
        $this->assertEquals('/public/img/users/user.jpg', $user->avatar);
        
    }


}
