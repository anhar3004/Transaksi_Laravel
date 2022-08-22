<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Anhar Hadhitya',
                'email' => 'anharhadhitya@gmail.com',
                'level'=>'Admin',
                'foto' => 'anhar.jpeg',
               'password'=> bcrypt('admin'),
            ],
            [  'nama' => 'Mutiara Azahra Nur Fadhilah',
                'email' => 'mutiara@gmail.com',
                'level'=>'Admin',
                'foto' => 'mutiara.jpeg',
               'password'=> bcrypt('admin'),
            ],
        ];


        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
