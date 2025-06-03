<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1,20) as $index) {
            Advertisement::create([
                'user_id' => rand(1,2),
                'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'slug' => $faker->slug,
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'phone' => $faker->phoneNumber,
                'location' => $faker->numberBetween($min = 1, $max = 20),
            ]);
        }
    }
}
