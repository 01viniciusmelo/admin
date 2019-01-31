<?php

namespace Tests\Unit\Models;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function a_user_model_belongs_to_a_role() {
    
        $role = $this->create(Role::class);
        
        $user = $this->create(User::class, ['role_id' => $role->id]);
        
        $this->assertInstanceOf(Role::class, $user->role);
        
    }
}
