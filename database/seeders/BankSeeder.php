<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BankSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $fundTypes = ['Fond général', 'Fond de fonctionnement', 'Fond spécifique 1', 'Fond spécifique 2'];

        // Générer 100 entrées aléatoires
        for ($i = 0; $i < 100; $i++) {
            DB::table('bank')->insert([
                'description' => $faker->sentence(3), // Génère une description aléatoire
                'amount' => $faker->randomFloat(2, -200, 200), // Montant entre -200 et 200€
                'fund_type' => $faker->randomElement($fundTypes), // Type de fond aléatoire
                'transaction_date' => $faker->date('Y-m-d', 'now'), // Date aléatoire jusqu'à aujourd'hui
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
