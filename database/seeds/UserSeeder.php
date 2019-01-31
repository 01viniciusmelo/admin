<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            
            'name' => 'Alberto Rosas E.',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => bcrypt('password'),
            'avatar' => 'avatar.png',
            
        ])->save();
    }
}
