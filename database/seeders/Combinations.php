<?php

namespace Database\Seeders;

use App\Models\Combination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Combinations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Combination::factory(10)->create();
    }
}
