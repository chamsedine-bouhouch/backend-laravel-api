<?php

namespace Database\Seeders;

use App\Models\PreferenceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PreferenceCategory::create([
            'name' => 'source'
        ]);
    }
}
