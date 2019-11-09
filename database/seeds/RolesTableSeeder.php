<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name'        => 'Superuser',
                'slug'        => 'superuser',
                'description' => 'Superuser Role',
                'level'       => 1,
            ],
            [
                'name'        => 'Supervisor',
                'slug'        => 'supervisor',
                'description' => 'Supervisor Role',
                'level'       => 2,
            ],
            [
                'name'        => 'Administrative',
                'slug'        => 'administrative',
                'description' => 'Administrative Role',
                'level'       => 3,
            ],
            [
                'name'        => 'Janitor',
                'slug'        => 'janitor',
                'description' => 'Janitor Role',
                'level'       => 4,
            ],
            [
                'name'        => 'Unverified',
                'slug'        => 'unverified',
                'description' => 'Unverified Role',
                'level'       => 0,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name'          => $RoleItem['name'],
                    'slug'          => $RoleItem['slug'],
                    'description'   => $RoleItem['description'],
                    'level'         => $RoleItem['level'],
                ]);
            }
        }
    }
}
