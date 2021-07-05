<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // p.93
        // User::create([
        //     'name' => sprintf('%s %s', Str::random(3), Str::random(4)),
        //     'email' => Str::random(10) . '@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        // p.94 시더 수정 작동하지 않음
        User::factory()->count(5)->create();
    }
}
