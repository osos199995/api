<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\makers;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('Set FOREIGN_KEY_CHECKS = 0');



        makers::truncate();



        Model::unguard();


         $this->call('makerSeed');
         $this->call('vehiclesSeed');
    }
}
