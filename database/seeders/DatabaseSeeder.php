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
        // User::factory(10)->create();

        Fund::factory()
            ->has(Transaction::factory()
                ->count(100))
            ->create([
                'name' => 'Général'
            ]);
        Fund::factory()
            ->has(Transaction::factory()
                ->count(100))
            ->create([
                'name' => 'Fonctionnement'
            ]);
        Fund::factory()
            ->count(10)
            ->has(Transaction::factory()
                ->count(100))
            ->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Bruno Marée',
            'email' => 'brunome638@gmail.com',
        ]);
    }
}
