<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $roles = [
            
            [
                'name' => 'admin',
                'display_name' => 'Administrador'
            ],
            [
                'name' => 'seller',
                'display_name' => 'Vendedor'
            ],
            [
                'name' => 'user',
                'display_name' => 'Usuario Regular'
            ]
            
        ];
        
        \App\Role::insert($roles);
        
    }
}
