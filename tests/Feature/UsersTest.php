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
    public function a_guest_cannot_visit_home() {
        
        $this->get(route('home'))
             ->assertStatus(302)
             ->assertSee('/login');
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function a_guest_cannot_visit_a_specific_user() {
        
        $someUser = $this->create(User::class);
        
        $this->get(
            
            "/users/$someUser->id"
            
        )->assertStatus(302)
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
        
        $response = $this->get('/users/' . $user->id);
        
        $response->assertOk();
        $response->assertViewIs('users.show');
        $response->assertViewHas('user');
        
    }
    
}
