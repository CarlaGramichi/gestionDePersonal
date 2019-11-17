<?php

use App\PositionDocument;
use Illuminate\Database\Seeder;

class PositionsDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PositionDocument::class, 120)->create();
    }
}
