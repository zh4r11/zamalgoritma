<?php

use Illuminate\Database\Seeder;

class RawDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('raw_data')->insert([
            'name' => 'markus ewi',
            'phone' => '081284246789',
            'address' => 'pendopo jalan agus salim  RT/RW: 17/08 Kel : sampit Kec : Delta Pawan Kab/Kota : ketapang Prov : kalimantan barat',
        ]);
    }
}
