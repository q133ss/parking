<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            'Пользователь'  => 'user',
            'Администратор' => 'admin'
        ];

        foreach ($roles as $name => $slug){
            Role::create(['name' => $name, 'slug' => $slug]);
        }

        User::create([
            'name'       => 'Пользователь',
            'email'      => 'user@email.net',
            'password'   => Hash::make('password'),
            'car_number' => 'A111AA77',
            'role_id'    => Role::where('slug', 'user')->pluck('id')->first()
        ]);

        User::create([
            'name'       => 'Админ',
            'email'      => 'admin@email.net',
            'password'   => Hash::make('password'),
            'car_number' => 'A111AA11',
            'role_id'    => Role::where('slug', 'admin')->pluck('id')->first()
        ]);
    }
}
