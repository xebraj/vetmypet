<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 
        User::create([
        'name' => 'Maria',
        'last_name' => 'Gonzalez',
        'email' => 'mggs31@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('1587412'), // secret
        'ci' => '21311487',
        'address' => '',
        'phone_number' => '',    
        'role' => 'admin'
    ]);
        // 2
        User::create([
            'name' => 'Patient',
            'last_name' => 'Test',
            'email' => 'patient@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'), // secret
            'ci' => '28434234',
            'address' => '',
            'phone_number' => '',    
            'role' => 'patient'
        
    ]);
        // 3
        User::create([
            'name' => 'Medico',
            'last_name' => 'Test',
            'email' => 'doctor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'), // secret
            'ci' => '21344566',
            'address' => '',
            'phone_number' => '',    
            'role' => 'doctor'
    ]);
        factory(User::class, 50)->states('patient')->create();
    }
}

