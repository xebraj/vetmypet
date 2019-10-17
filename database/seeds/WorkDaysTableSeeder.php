<?php

use Illuminate\Database\Seeder;

use App\WorkDay;

class WorkDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<7; ++$i){
            WorkDay::create([
                'day' => $i,
                'active' => ($i==3),

                'morning_start' => ($i==3 ? '08:30:00' : '07:00:00'),
                'morning_end' => ($i==3 ? '09:30:00' : '07:00:00'),

                'afternoon_start' => ($i==3 ? '14:00:00' : '13:00:00'),
                'afternoon_end' => ($i==3 ? '18:00:00' : '13:00:00'),

                'user_id' => 3 // Medico Test(UsersTableSeeder);
            ]);
        }
    }
}
