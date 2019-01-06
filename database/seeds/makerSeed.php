<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\makers;
class makerSeed extends Seeder
{
    /**
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker =Faker::create();
        for($i=0 ;$i<6; $i++){

    makers::create([
        'name'=>$faker->word(),
        'phone'=>$faker->randomDigit(5)

    ]);

}

    }
}
