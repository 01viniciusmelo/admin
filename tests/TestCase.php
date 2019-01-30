<?php

namespace Tests;

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
     * @return array
     */
    public function getUserData () : array {
        
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
