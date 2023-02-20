<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
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
                'nama_user' => 'Administrator',
                'username' => 'admin',
                'password' =>bcrypt('123'),
            ]
            ];

        foreach ($user as $key => $value) {
            ModelsUser::create($value);
        }
    }
}
