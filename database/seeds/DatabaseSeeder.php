<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            DB::table('contact_book')->insert([
                'fullname' => $faker->name,
                'address' => $faker->country,
                'mobile' => $faker->phoneNumber,
                'email' => $faker->email,
                'status' => 1

            ]);
        }
    }
}
