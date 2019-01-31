<?php

namespace Tests\Unit\Http\Requests;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreUserRequestTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function the_name_field_is_required() {
        
        $response = $this->postJson(
            
            route('users.store'),
            $this->getUserData(['name' => ''])
        
        );
        
        $response->assertStatus(422);
        
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function the_email_field_is_required() {
        
        $response = $this->postJson(
            
            route('users.store'),
            $this->getUserData(['email' => ''])
        
        );
        
        $response->assertStatus(422);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function the_email_field_must_be_an_email() {
        
        $this->postJson(
            
            route('users.store'),
            $this->getUserData(['email' => 'example@',])
        
        )->assertStatus(422);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function the_email_field_must_be_unique() {
        
        $this->create(User::class, [
            
            'email' => 'example@company.com'
        
        ]);
        
        $this->postJson(
            
            route('users.store'),
            $this->getUserData(['email' => 'example@company.com'])
        
        )->assertStatus(422);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function the_role_field_is_required() {
        
        $response = $this->postJson(
            
            route('users.store'),
            $this->getUserData(['role' => ''])
        
        );
        
        $response->assertStatus(422);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function the_role_field_must_be_a_value_between_admin_seller_or_user() {
        
        $response = $this->postJson(
            
            route('users.store'),
            $this->getUserData(['role' => 'buyer'])
        
        );
        
        $response->assertStatus(422);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function the_password_field_is_required() {
        
        $response = $this->postJson(
            
            route('users.store'),
            $this->getUserData(['password' => ''])
        
        );
        
        $response->assertStatus(422);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function the_password_field_must_be_confirmed() {
    
        $this->postJson(
        
            route('users.store'),
            $this->getUserData([
            
                'password' => 'password',
                'password_confirmation' => null
        
            ])
    
        )->assertStatus(422);
        
    }
    
}
