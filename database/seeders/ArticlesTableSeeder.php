<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Carbon\Factory;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();

        $user->each(function ($user) {
            $user->articles()->save(
                // factory(App\Models\Article::class)->make()
                Article::factory()->make()
            );
        });
    }
}
