<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Test1',
            'country' => 'Japan',
            'email' => 'test1@mail.com',
            'password' => Hash::make('asdfasdf'),
            'role_id' => 1
        ]);
    }
}
