<?php

use App\LicenseType;
use Illuminate\Database\Seeder;

class LicenseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Especiales',
            'Extraordinarias con goce de haberes',
            'Extraordinarias sin goce de haberes',
            'Justificación de inasistecias',
            'Franquicias',
        ];

        foreach ($types as $type) {
            LicenseType::create([
                'name' => $type,
            ]);
        }
    }
}
