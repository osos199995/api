<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\vehicle;
class vehiclesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        for($i=0 ;$i<30; $i++){

            vehicle::create([
                'color'=>$faker->safeColorName(),
                'power'=>$faker->numberBetween(1000,5000),
                'capacity'=>$faker->numberBetween(10,20),
                'speed'=>$faker->numberBetween(1000,5000),

                'maker_id'=>$faker->numberBetween(1,5)

            ]);

        }

    }
}
