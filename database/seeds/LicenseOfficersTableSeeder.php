<?php


use App\LicenseOfficer;
use Illuminate\Database\Seeder;

class LicenseOfficersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officers = [
            'Director Unidad Escolar',
            'Director Prov. RRHH - Min. de Educ. C. y T.',
            'Dir. Prov. RRHH',
            'Director de Nivel',
            'Director de Unidad Escolar - Director de Nivel',
            'Secretario de Unidad Escolar',
            'Poder Ejecutivo',
            'Min. de Educ. C. y T.',
        ];

        foreach ($officers as $officer) {
            LicenseOfficer::create([
                'name' => $officer,
            ]);
        }
    }
}
