<?php

namespace Tests;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    public function signIn($attributes = []) {
        
        return $this->actingAs(
            
            $this->create(User::class, $attributes)
        
        );
        
    }
    
    /**
     * @param array $override
     * @return array
     */
    public function getUserData ($override = []) : array {
        
        $usersData = array_merge([
        
            'name' => 'Alberto Rosas E.',
            'email' => 'alberto.rsesc@protonmail.com',
            'role_id' => $this->create(Role::class, ['name' => 'admin'])->id,
            'password' => 'password',
            'password_confirmation' => 'password',
            'avatar' => 'data:image/jpeg;base64,/9j/4gIcSUNDX1BST0ZJTEUAAQEAAAIMbGNtcwIQ'
        
        ], $override);
        
        return $usersData;
    }
    
    /**
     * factory()->create();
     *
     * @param $class
     * @param array $attributes
     * @param null $times
     * @return mixed
     */
    public function create($class, $attributes = [], $times = null) {
        
        return factory($class, $times)->create($attributes);
        
    }
    
    /**
     * factory()->make();
     *
     * @param $class
     * @param array $attributes
     * @param null $times
     * @return mixed
     */
    public function make($class, $attributes = [], $times = null) {
        
        return factory($class, $times)->make($attributes);
        
    }
}
