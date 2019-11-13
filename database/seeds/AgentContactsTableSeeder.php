<?php

use App\AgentContact;
use Illuminate\Database\Seeder;

class AgentContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AgentContact::class, 100)->create();
    }
}
