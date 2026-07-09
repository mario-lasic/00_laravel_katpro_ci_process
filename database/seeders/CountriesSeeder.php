<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'naziv' => 'Hrvatska',
                'regija' => 'Europa',
                'broj_stanovnika' => 3870000,
            ],
            [
                'naziv' => 'Njemačka',
                'regija' => 'Europa',
                'broj_stanovnika' => 83100000,
            ],
            [
                'naziv' => 'Japan',
                'regija' => 'Azija',
                'broj_stanovnika' => 125800000,
            ],
            [
                'naziv' => 'Brazil',
                'regija' => 'Južna Amerika',
                'broj_stanovnika' => 214000000,
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
