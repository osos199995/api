<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\makers;
use App\User;
use App\vehiclesSeed;
use App\UserSeeder;
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
        User::truncate();



        Model::unguard();


         $this->call('makerSeed');
         $this->call('vehiclesSeed');
         $this->call('UserSeeder');
    }
}
