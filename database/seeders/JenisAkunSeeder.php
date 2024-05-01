<?php

namespace Database\Seeders;

use App\Models\JenisAkun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisAkun = [
            [
                'id' => '1',
                'nama' => 'Aset',                
            ],
            [
                'id' => '2',
                'nama' => 'Kewajiban',                
            ],
            [
                'id' => '3',
                'nama' => 'Modal',                
            ],
            [
                'id' => '4',
                'nama' => 'Pendapatan',                
            ],
            [
                'id' => '5',
                'nama' => 'Beban',                
            ],
        ];

        foreach ($jenisAkun as $data) {
            JenisAkun::create($data);
        }
    }
}
