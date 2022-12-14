<?php

namespace Database\Seeders;

use App\Models\LvWargaNegara;
use Illuminate\Database\Seeder;

class WargaNegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Indonesia', 'Malaysia', 'Singapura'];
        for ($i=0; $i < count($data); $i++) {
            // $id = IdGenerator::generate(['table' => 'lv_agama','field' => 'kodeagama', 'length' => 5, 'prefix' =>date('y')]);
            $add = new LvWargaNegara;
            $add->kodewn = $i;
            $add->namawn = $data[$i];
            $add->save();
        }
    }
}
