<?php

namespace Tests\Feature\Api;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function can_get_all_roles() {
        
        $this->getJson(route('roles.index'))->assertOk();
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function can_store_a_role() {
        
        $this->postJson(
            
            route('roles.store'),
            [
                'name' => 'admin',
                'display_name' => 'Administrador'
            ]
        
        )->assertOk();
        
        $this->assertEquals(1, Role::count());
        
        $role = Role::find(1);
        $this->assertEquals('admin', $role->name);
        $this->assertEquals('Administrador', $role->display_name);
        
    }
    
    /**
    *   @test
    *   @throws \Throwable
    */
    public function can_visit_a_specific_role() {
    
        $role = $this->create(Role::class);
        
        $this->getJson(route('roles.show', $role))->assertOk();
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function can_update_a_role() {
        
        $roleToEdit = $this->create(Role::class);
        
        $this->putJson(
            
            route('roles.update', $roleToEdit),
            [
                'name' => 'seller',
                'display_name' => 'Vendedor'
            ]
        
        )->assertOk();
        
        $updatedRole = Role::find($roleToEdit->id);
        $this->assertEquals('seller', $updatedRole->name);
        $this->assertEquals('Vendedor', $updatedRole->display_name);
        
    }
    
    /**
     *   @test
     *   @throws \Throwable
     */
    public function can_delete_a_specific_role() {
        
        $role = $this->create(Role::class);
        
        $this->deleteJson(
            
            route('roles.destroy', $role)
        
        )->assertOk();
        
        $this->assertDatabaseMissing('roles', $role->toArray());
        
    }
    
}
