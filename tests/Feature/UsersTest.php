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
        
        $response = $this->get(route('users.index'));
        
        $response->assertOk();
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
        
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function an_authenticated_user_can_store_a_user() {
        
        $this->withoutExceptionHandling();
    
        $this->signIn();
    
        $this->post(
            route('users.store'),
            $this->getUserData()
        )->assertRedirect(route('users.index'));
    
        $this->assertEquals(2, User::count());
    
        $user = User::find(2);
        $this->assertEquals('Alberto Rosas E.', $user->name);
        $this->assertEquals('alberto.rsesc@protonmail.com', $user->email);
        $this->assertEquals('admin', $user->role);
        $this->assertEquals('/public/img/users/user.jpg', $user->avatar);
        
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function an_authenticated_user_can_view_a_user() {
        
        $this->signIn();
        
        $user = $this->create(User::class);
        
        $response = $this->get(route('users.show', $user));
        
        $response->assertOk();
        $response->assertViewIs('users.show');
        $response->assertViewHas('user');
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
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
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function an_authenticated_user_can_delete_a_user() {
    
        $userToDestroy = $this->create(User::class);
    
        $this->signIn();
    
        $this->delete(
            
            route('users.destroy', $userToDestroy)
        
        )->assertRedirect(route('users.index'));
    
        $this->assertDatabaseMissing('users', $userToDestroy->toArray());
        
    }
    
    /**
     * @return array
     */
    private function getUserData () : array {
        
        $usersData = [
            'name' => 'Alberto Rosas E.',
            'email' => 'alberto.rsesc@protonmail.com',
            'role' => User::ROLES[0],
            'avatar' => '/public/img/users/user.jpg',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];
        
        return $usersData;
    }
    
}
