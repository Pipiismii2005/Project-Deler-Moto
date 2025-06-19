<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                  'name'=> 'Admin',
                  'email'=> 'admin@gmail.com',
                  'password'=> bcrypt('12345678'),
                  'role'=> 'admin'
            ]
        );

        User::create(
            [
                  'name'=> 'Penjual1',
                  'email'=> 'penjual1@gmail.com',
                  'password'=> bcrypt('12345678'),
                  'role'=> 'penjual'
            ]
        );

        User::create(
            [
                  'name'=> 'Penjual2',
                  'email'=> 'penjual2@gmail.com',
                  'password'=> bcrypt('12345678'),
                  'role'=> 'penjual'
            ]
        );

        User::create(
            [
                  'name'=> 'Pembeli1',
                  'email'=> 'pembeli1@gmail.com',
                  'password'=> bcrypt('12345678'),
                  'role'=> 'pembeli'
            ]
        );

        User::create(
            [
                  'name'=> 'Pembeli2',
                  'email'=> 'pembeli2@gmail.com',
                  'password'=> bcrypt('12345678'),
                  'role'=> 'pembeli'
            ]
        );
    }
}
