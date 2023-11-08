<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosens')->insert([
            'nidn' => '00112233',
            'nama' => 'Andi',
            'alamat' => 'Jalan Pancasila',
            'tgl_lahir' => '1980-08-17'
        ]);

        DB::table('dosens')->insert([
            'nidn' => '00112234',
            'nama' => 'Bunga',
            'alamat' => 'Jalan Sepakat 2',
            'tgl_lahir' => '1991-02-01'
        ]);
    }
}
