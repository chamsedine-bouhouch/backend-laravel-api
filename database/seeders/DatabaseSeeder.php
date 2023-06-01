<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $sources = \App\Models\PreferenceCategory::create([
            'name' => 'sources'
        ]);
        \App\Models\PreferenceCategory::create([
            'name' => 'categories'
        ]);
        $authors = \App\Models\PreferenceCategory::create([
            'name' => 'authors'
        ]);

        // \App\Models\Preference::create([
        //     'value' => 'Engadget',
        //     'preference_categories_id' => $sources->id,
        //     'user_id' => $user->id
        // ]);

        // \App\Models\Preference::create([
        //     'value' => 'The-Verge',
        //     'preference_categories_id' => $sources->id,
        //     'user_id' => $user->id
        // ]);

        // \App\Models\User::factory(10)->create();


    }
}
