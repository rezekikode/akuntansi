<?php

namespace Database\Seeders;

use App\Models\JenisJurnal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisJurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisJurnal = [
            [
                'id' => '1',
                'nama' => 'Jurnal Umum',                
            ],
            [
                'id' => '2',
                'nama' => 'Jurnal Khusus Pembelian (Secara Kredit)',                
            ],
            [
                'id' => '3',
                'nama' => 'Jurnal Khusus Penjualan (Secara Kredit)',                
            ],
            [
                'id' => '4',
                'nama' => 'Jurnal Khusus Penerimaan Kas',                
            ],
            [
                'id' => '5',
                'nama' => 'Jurnal Khusus Pengeluaran Kas',                
            ],
            [
                'id' => '6',
                'nama' => 'Jurnal Penyesuaian',                
            ],
            [
                'id' => '7',
                'nama' => 'Jurnal Penutup',                
            ],
            [
                'id' => '8',
                'nama' => 'Jurnal Pembalik',                
            ],
        ];

        foreach ($jenisJurnal as $data) {
            JenisJurnal::create($data);
        }
    }
}
