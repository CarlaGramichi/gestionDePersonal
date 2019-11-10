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
        $superuserRole = config('roles.models.role')::where('slug', '=', 'superuser')->first();
        $supervisorRole = config('roles.models.role')::where('slug', '=', 'supervisor')->first();
        $administrativeRole = config('roles.models.role')::where('slug', '=', 'administrative')->first();
        $janitorRole = config('roles.models.role')::where('slug', '=', 'janitor')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */

        if (config('roles.models.defaultUser')::where('email', '=', 'superusuario@sait.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Superusuario',
                'agent_id' => '1',
                'email'    => 'superusuario@sait.com',
                'password' => 'superusuario',
            ]);

            $newUser->attachRole($superuserRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'supervisor@sait.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Supervisor',
                'agent_id' => '2',
                'email'    => 'supervisor@sait.com',
                'password' => 'supervisor',
            ]);

            $newUser->attachRole($supervisorRole);

        }

        if (config('roles.models.defaultUser')::where('email', '=', 'administrativo@sait.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Administrativo',
                'agent_id' => '3',
                'email'    => 'administrativo@sait.com',
                'password' => 'administrativo',
            ]);

            $newUser->attachRole($administrativeRole);

        }

        if (config('roles.models.defaultUser')::where('email', '=', 'bedel@sait.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Bedel',
                'agent_id' => '4',
                'email'    => 'bedel@sait.com',
                'password' => 'bedel',
            ]);

            $newUser->attachRole($janitorRole);
        }
    }
}
