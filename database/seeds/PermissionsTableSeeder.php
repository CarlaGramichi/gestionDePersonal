<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            /* Users */
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ],
            /* ./Users */

            /* Pof */
            [
                'name'        => 'Puede listar documentos de P.O.F.',
                'slug'        => 'pof.documents.index',
                'description' => 'Puede listar documentos de P.O.F.',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Puede crear documentos de P.O.F.',
                'slug'        => 'pof.documents.create',
                'description' => 'Puede crear documentos de P.O.F.',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Puede guardar documentos de P.O.F.',
                'slug'        => 'pof.documents.store',
                'description' => 'Puede guardar documentos de P.O.F.',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Puede eliminar documentos de P.O.F.',
                'slug'        => 'pof.documents.destroy',
                'description' => 'Puede eliminar documentos de P.O.F.',
                'model'       => 'Permission',
            ],
            /* ./Pof */
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
