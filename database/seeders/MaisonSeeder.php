<?php

namespace Database\Seeders;

use App\Models\Maison;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        Maison::factory()
            ->count(5)
            ->create();
    }
}
