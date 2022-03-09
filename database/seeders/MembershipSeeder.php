<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberships = [
            [
                'name' =>'Pay As You Go'
            ],
            [
                'name' =>'Monthly'
            ],
            [
                'name' =>'Quarterly'
            ],
            [
                'name' =>'Annual'
            ]
        ];

     foreach ($memberships as $key => $value) {
            Membership::create($value);
        }
    }
}
