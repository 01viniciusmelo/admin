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
