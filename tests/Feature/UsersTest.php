<?php

namespace Tests\Feature;

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
    public function a_guest_user_cannot_visit_home() {
        
        $this->get(route('home'))
             ->assertStatus(302)
             ->assertSee('/login');
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function an_authenticated_user_can_visit_users_index() {
        
        $this->signIn();
        
        $response = $this->get('/users');
        
        $response->assertOk();
        $response->assertViewIs('users.index');
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function an_authenticated_user_can_view_a_specific_user() {
        
        $this->signIn();
        
        $user = $this->create(User::class);
        
        $response = $this->get(route('users.show', $user));
        
        $response->assertOk();
        $response->assertViewIs('users.show');
        $response->assertViewHas('user');
        
    }
    

    public function an_authenticated_user_can_update_a_user() {
        
        $userToEdit = $this->create(User::class);
        
        $this->signIn();
        
        $response = $this->put(
            
            route('users.update', $userToEdit),
            $this->getUserData()
        
        );
        
        $response->assertRedirect(route('users.show', $userToEdit));
        
        $editedUser = User::find($userToEdit->id);
        $this->assertEquals('Alberto Rosas E.', $editedUser->name);
        $this->assertEquals('alberto.rsesc@protonmail.com', $editedUser->email);
        $this->assertEquals('admin', $editedUser->role);
        $this->assertEquals('/public/img/users/user.jpg', $editedUser->avatar);
        
    }
    

    public function an_authenticated_user_can_delete_a_user() {
    
        $userToDestroy = $this->create(User::class);
    
        $this->signIn();
    
        $this->delete(
            
            route('users.destroy', $userToDestroy)
        
        )->assertRedirect(route('users.index'));
    
        $this->assertDatabaseMissing('users', $userToDestroy->toArray());
        
    }
    
}
