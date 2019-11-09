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
            'Otorgante',
            'Interviniente',
        ];

        foreach ($officers as $officer) {
            LicenseOfficer::create([
                'name' => $officer,
            ]);
        }
    }
}
