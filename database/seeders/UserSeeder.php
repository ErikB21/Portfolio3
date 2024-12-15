<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Erik',
                'surname' => 'Borgogno',
                'slug' => 'erik-borgogno',
                'email' => 'test@text.it',
                'password'  => Hash::make('testtest'),
                'work' => 'Sviluppatore Web',
                'age' => 27,
                'is_admin' => 1,
                'cv' => '',
                'profile_pic' => ''
            ]

        ]);
    }
}
