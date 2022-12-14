<?php

namespace Database\Seeders;

use App\Models\LvAgama;
use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
        for ($i=0; $i < count($data); $i++) {
            $id = IdGenerator::generate(['table' => 'lv_agama','field' => 'kodeagama', 'length' => 5, 'prefix' =>date('y')]);
            $add = new LvAgama;
            $add->kodeagama = $id;
            $add->namaagama = $data[$i];
            $add->save();
        }
    }
}
