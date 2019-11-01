<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supervisorRole = config('roles.models.role')::where('slug', '=', 'supervisor')->first();
        $administrativeRole = config('roles.models.role')::where('slug', '=', 'administrative')->first();
        $janitorRole = config('roles.models.role')::where('slug', '=', 'janitor')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'supervisor@supervisor.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Supervisor',
                'agent_id' => '1',
                'email'    => 'supervisor@supervisor.com',
                'password' => bcrypt('supervisor'),
            ]);

            $newUser->attachRole($supervisorRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'administrative@administrative.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Administrative',
                'agent_id' => '1',
                'email'    => 'administrative@administrative.com',
                'password' => bcrypt('administrative'),
            ]);

            $newUser->attachRole($administrativeRole);

            factory(User::class, 15)->create();
        }
    }
}
