<?php

namespace Database\Seeders;

use App\Models\level_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            [
                'id_level' => 1,
                'nama_level' => 'Admin',
            ],
            [
                'id_level' => 2,
                'nama_level' => 'Siswa',
            ]
            ];

        foreach ($level as $key => $value) {
            level_user::create($value);
        }
    }
}
