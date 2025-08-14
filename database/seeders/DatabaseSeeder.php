<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Fund;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Fund::factory()
            ->create([
                'name' => 'Général'
            ]);
        Fund::factory()
            ->create([
                'name' => 'Fonctionnement'
            ]);
        User::factory()->create([
            'name' => 'Bruno Marée',
            'email' => 'brunome638@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Dominique Vilain',
            'email' => 'dominique.vilain@hepl.be',
        ]);
        User::factory()->create([
            'name' => 'Michaël Lecerf',
            'email' => 'michael@lecerf.be',
        ]);
    }
}
