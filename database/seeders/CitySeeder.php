<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['name' => 'Beograd'],
            ['name' => 'Novi Sad'],
            ['name' => 'Niš'],
            ['name' => 'Kragujevac'],
            ['name' => 'Subotica'],
            ['name' => 'Zrenjanin'],
            ['name' => 'Pančevo'],
            ['name' => 'Čačak'],
            ['name' => 'Kraljevo'],
            ['name' => 'Smederevo'],
            ['name' => 'Leskovac'],
            ['name' => 'Valjevo'],
            ['name' => 'Užice'],
            ['name' => 'Požarevac'],
            ['name' => 'Vranje'],
            ['name' => 'Šabac'],
            ['name' => 'Sombor'],
            ['name' => 'Pirot'],
            ['name' => 'Zaječar'],
            ['name' => 'Bor'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}

