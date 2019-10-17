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
        'name' => 'Nefersol',
        'last_name' => 'Guillen',
        'email' => 'neff.esea@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('n21494455'), // secret
        'ci' => '21494455',
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
            'password' => bcrypt('n21494455'), // secret
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
            'password' => bcrypt('n21494455'), // secret
            'ci' => '21311487',
            'address' => '',
            'phone_number' => '',    
            'role' => 'doctor'
    ]);
        factory(User::class, 50)->states('patient')->create();
    }
}

