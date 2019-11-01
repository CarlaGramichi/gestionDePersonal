<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Interino', 'Reemplazante', 'Titular'];

        foreach ($statuses as $status) {
            Status::create([
                'name'       => $status,
                'is_deleted' => '0'
            ]);
        }
    }
}
