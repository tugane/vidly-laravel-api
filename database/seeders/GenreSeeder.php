<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $genres = [
    [  
            'name'=>'Action'
        ],
            [
            'name'=>'Comedy'
        ],
            [
            'name'=>'Thriller'
        ],
            [
            'name'=>'Romance'
        ],
            [
            'name'=>'Family'
        ]
    ];
     foreach ($genres as $key => $value) {
            Genre::create($value);
        }
    }
}
