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
                'name'        => 'Puede ver usuarios',
                'slug'        => 'view.users',
                'description' => 'Puede ver usuarios',
                'model'       => 'User',
            ],
            [
                'name'        => 'Puede crear usuarios',
                'slug'        => 'create.users',
                'description' => 'Puede crear usuarios',
                'model'       => 'User',
            ],
            [
                'name'        => 'Puede editar usuarios',
                'slug'        => 'edit.users',
                'description' => 'Puede editar usuarios',
                'model'       => 'User',
            ],
            [
                'name'        => 'Puede borrar usuarios',
                'slug'        => 'delete.users',
                'description' => 'Puede borrar usuarios',
                'model'       => 'User',
            ],
            /* ./Users */

            /* Pof */
            [
                'name'        => 'Puede listar documentos de P.O.F.',
                'slug'        => 'pof.documents.index',
                'description' => 'Puede listar documentos de P.O.F.',
                'model'       => 'PofDocument',
            ],
            [
                'name'        => 'Puede crear documentos de P.O.F.',
                'slug'        => 'pof.documents.create',
                'description' => 'Puede crear documentos de P.O.F.',
                'model'       => 'PofDocument',
            ],
            [
                'name'        => 'Puede guardar documentos de P.O.F.',
                'slug'        => 'pof.documents.store',
                'description' => 'Puede guardar documentos de P.O.F.',
                'model'       => 'PofDocument',
            ],
            [
                'name'        => 'Puede eliminar documentos de P.O.F.',
                'slug'        => 'pof.documents.destroy',
                'description' => 'Puede eliminar documentos de P.O.F.',
                'model'       => 'PofDocument',
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
                    'name'        => $Permissionitem['name'],
                    'slug'        => $Permissionitem['slug'],
                    'description' => $Permissionitem['description'],
                    'model'       => $Permissionitem['model'],
                ]);
            }
        }
    }
}
