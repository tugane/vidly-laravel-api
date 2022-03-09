<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Movie::factory(30)->create();
        // \App\Models\Genre::factory(30)->create();
        // \App\Models\Membership::factory(30)->create();
        $this->call([
            GenreSeeder::class,
            MembershipSeeder::class,
        ]);
    }
}
