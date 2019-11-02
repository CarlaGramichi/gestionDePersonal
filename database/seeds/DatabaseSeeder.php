<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(StatusesTableSeeder::class);
        $this->call(AgentsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(RelationshipsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);


        Model::reguard();
    }
}
