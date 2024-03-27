<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // School::create([
        //     'name' => 'School 1',
        //     'address' => 'Address 1',
        // ]);

        School::factory(100)->create();
    }
}
