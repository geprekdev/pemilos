<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use App\Models\Setting;
use App\Models\User;
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
        Setting::create([
            'attribute' => 'vote',
            'value' => 'off',
        ]);

        if (app()->isLocal()) {
            User::factory(10)->create();
            Candidate::factory(4)->create();
        }
    }
}
