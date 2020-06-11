<?php

use Illuminate\Database\Seeder;

class OffreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Offre', 15)->create();
    }
}
