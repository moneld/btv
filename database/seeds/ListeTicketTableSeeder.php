<?php

use Illuminate\Database\Seeder;

class ListeTicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Models\ListeTicket::class, 100)->create();
    }
}
