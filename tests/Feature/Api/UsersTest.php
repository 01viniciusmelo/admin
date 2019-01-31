<?php

namespace Tests\Feature\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    
    use RefreshDatabase;
    
    protected function setUp () {
    
        parent::setUp();
    
        $this->withMiddleware('ajax');
        
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function can_get_all_users() {
    
        $this->getJson(route('users.index'))->assertOk();
        
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function can_store_a_user() {
    
        $this->postJson(
        
            route('users.store'),
            $this->getUserData()
    
        )->assertOk();
    
        $this->assertEquals(1, User::count());
    
        $user = User::find(1);
        $this->assertEquals('Alberto Rosas E.', $user->name);
        $this->assertEquals('alberto.rsesc@protonmail.com', $user->email);
        $this->assertEquals('admin', $user->role);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function can_update_a_user() {
        
        $userToEdit = $this->create(User::class);
    
        $this->putJson(
            
            route('users.update', $userToEdit),
            $this->getUserData()
        
        )->assertOk();
        
        $updatedUser = User::find($userToEdit->id);
        $this->assertEquals('Alberto Rosas E.', $updatedUser->name);
        $this->assertEquals('alberto.rsesc@protonmail.com', $updatedUser->email);
        $this->assertEquals('admin', $updatedUser->role);
    
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function can_delete_a_specific_user() {
        
        $user = $this->create(User::class);
        
        $this->deleteJson(

            route('users.destroy', $user)

        )->assertOk();
        
        $this->assertDatabaseMissing('users', $user->toArray());
        
    }

}
