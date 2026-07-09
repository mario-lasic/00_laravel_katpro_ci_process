<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobiteli = Category::where('naziv', 'Mobiteli')->first();
        $laptopi = Category::where('naziv', 'Laptopi')->first();
        $monitori = Category::where('naziv', 'Monitori')->first();
        $tipkovnice = Category::where('naziv', 'Tipkovnice')->first();
        $misevi = Category::where('naziv', 'Misevi')->first();

        $country1 = Country::where('naziv', 'Hrvatska')->first();
        $country2 = Country::where('naziv', 'Brazil')->first();
        $country3 = Country::where('naziv', 'Japan')->first();
        $country4 = Country::where('naziv', 'Njemačka')->first();

        Product::create([
            'category_id' => $mobiteli->id,
            'naziv' => 'iPhone 15 Pro',
            'opis' => 'iPhone 15 Pro s najnovijim procesorom Apple M2.',
            'cijena' => 1299.99,
            'kolicina' => 100,
            'country_id' => $country1->id
        ]);
        Product::create([
            'category_id' => $mobiteli->id,
            'naziv' => 'iPhone 15',
            'opis' => 'Apple pametni telefon.',
            'cijena' => 899.99,
            'kolicina' => 8,
            'country_id' => $country2->id
        ]);

        Product::create([
            'category_id' => $laptopi->id,
            'naziv' => 'Lenovo ThinkPad E14',
            'opis' => 'Poslovni laptop.',
            'cijena' => 749.99,
            'kolicina' => 12,
            'country_id' => $country3->id
        ]);

        Product::create([
            'category_id' => $laptopi->id,
            'naziv' => 'HP ProBook 450',
            'opis' => 'Laptop za uredski rad.',
            'cijena' => 699.99,
            'kolicina' => 10,
            'country_id' => $country4->id
        ]);

        Product::create([
            'category_id' => $monitori->id,
            'naziv' => 'Dell 27 Monitor',
            'opis' => 'Monitor dijagonale 27 inča.',
            'cijena' => 219.99,
            'kolicina' => 20,
            'country_id' => $country2->id
        ]);
        Product::create([
            'category_id' => $monitori->id,
            'naziv' => 'LG UltraWide 34',
            'opis' => 'Široki monitor za produktivnost.',
            'cijena' => 399.99,
            'kolicina' => 6,
            'country_id' => $country3->id
        ]);

        Product::create([
            'category_id' => $tipkovnice->id,
            'naziv' => 'Logitech MX Keys',
            'opis' => 'Bežična tipkovnica.',
            'cijena' => 119.99,
            'kolicina' => 18,
            'country_id' => $country3->id
        ]);

        Product::create([
            'category_id' => $tipkovnice->id,
            'naziv' => 'Redragon K552',
            'opis' => 'Mehanička gaming tipkovnica.',
            'cijena' => 59.99,
            'kolicina' => 25,
            'country_id' => $country2->id
        ]);
        Product::create([
            'category_id' => $misevi->id,
            'naziv' => 'Logitech MX Master 3S',
            'opis' => 'Premium bežični miš.',
            'cijena' => 99.99,
            'kolicina' => 14,
            'country_id' => $country1->id
        ]);

        Product::create([
            'category_id' => $misevi->id,
            'naziv' => 'Razer DeathAdder',
            'opis' => 'Gaming miš.',
            'cijena' => 69.99,
            'kolicina' => 16,
            'country_id' => $country3->id
        ]);
    }
}
