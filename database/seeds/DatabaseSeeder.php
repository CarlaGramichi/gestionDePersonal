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

        $this->call(RelationshipsTableSeeder::class);

        $this->call(StatusesTableSeeder::class);
        $this->call(AgentsTableSeeder::class);
        $this->call(AgentContactsTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);

        $this->call(PositionsTableSeeder::class);
        $this->call(PositionTypesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(RegimensTrableSeeder::class);
        $this->call(LicenseOfficersTableSeeder::class);
        $this->call(LicenseTypesTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);

        $this->call(CareersTableSeeder::class);
        $this->call(CareerCoursesTableSeeder::class);
        $this->call(CareerCourseDivisionsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);

        Model::reguard();
    }
}
