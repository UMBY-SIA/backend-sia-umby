<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusNikahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['belum nikah', 'nikah', 'lajang', 'duda','janda'];
        for ($i=0; $i < count($data); $i++) {
            DB::table('lv_statusnikah')->insert([
                'statusnikah' => $i,
                'namastatus' => $data[$i],
            ]);
        }
    }
}
