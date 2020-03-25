<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Service::create([
            'libelle' => 'evenement'
        ]);

        \App\Models\Service::create([
            'libelle' => 'voirie'
        ]);
    }
}
