<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        factory(\App\User::class)->create([
            
            'email' => 'admin@admin.com',
            'avatar' => 'avatar.png'
        
        ]);
        
        $this->command->info('#======================#');
    
        $this->command->info('');
        $this->command->info('Usuario Administrador: admin@admin.com');
        $this->command->info('Contrasena: password');
        $this->command->info('');
        
        $this->command->info('#======================#');
        
    }
}
