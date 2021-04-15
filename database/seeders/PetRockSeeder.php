<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PetRock;

class PetRockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PetRock::factory()->count(10)->create();
    }
}
