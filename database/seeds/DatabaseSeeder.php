<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    private $seeders = [
    
        RoleSeeder::class,
        UserSeeder::class,
        
    ];
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call($this->seeders);
        
        $this->command->info('#======================#');
    
        $this->command->info('');
        $this->command->info('Usuario Administrador: admin@admin.com');
        $this->command->info('Contrasena: password');
        $this->command->info('');
        
        $this->command->info('#======================#');
        
    }
}
