<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SeederTableUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Usuario',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('superusuario1234'),
        ]);
        $user->assignRole('Super Usuario');

        $user = User::create([
            'name' => 'Arletty',
            'email' => 'arletty@gmail.com',
            'password' => Hash::make('arletty1234'),
        ]);
        $user->assignRole('Super Usuario');
    }
}
