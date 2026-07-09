<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            User::create(
                [
                    'name' => 'Administrator',
                    'email' => 'admin@tester.com',
                    'password' => Hash::make('admin1234'),
                    'is_admin' => true,
                    'datum_rod' => '1990-01-01',
                    'placa' => 3500
                ]
            );
            User::create(
                [

                    'name' => 'Pero Perić',
                    'email' => 'pero@tester.com',
                    'password' => Hash::make('pero1234'),
                    'is_admin' => false,
                    'datum_rod' => '1994-12-09',
                    'placa' => 1900

                ]
            );
            User::create(
                [
                    'name' => 'Ivana Ivić',
                    'email' => 'ivana@tester.com',
                    'password' => Hash::make('ivana1234'),
                    'is_admin' => false,
                    'datum_rod' => '1999-10-25',
                    'placa' => 2100
                ]
            );
            User::create(
                [
                    'name' => 'Luka Lukić',
                    'email' => 'Luka@tester.com',
                    'password' => Hash::make('luka1234'),
                    'is_admin' => false,
                    'datum_rod' => '1994-10-19',
                    'placa' => 2650
                ]
            );
            User::create(
                [
                    'name' => 'Ivo Ivić',
                    'email' => 'ivo@tester.com',
                    'password' => Hash::make('ivo1234'),
                    'is_admin' => false,
                    'datum_rod' => '2005-05-12',
                    'placa' => 3650
                ]
            );
        }
    }
