<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $akun = [
            [
                'id' => '1000',
                'jenis_akun_id' => '1',
                'nama' => 'Aset',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '1001',
                'akun_id' => '1000',
                'jenis_akun_id' => '1',
                'nama' => 'Kas',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '1002',
                'akun_id' => '1000',
                'jenis_akun_id' => '1',
                'nama' => 'Bank',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '1003',
                'akun_id' => '1000',
                'jenis_akun_id' => '1',
                'nama' => 'Piutang',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '1004',
                'akun_id' => '1000',
                'jenis_akun_id' => '1',
                'nama' => 'Persediaan',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '2000',
                'jenis_akun_id' => '2',
                'nama' => 'Kewajiban', 
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '2001',
                'akun_id' => '2000',
                'jenis_akun_id' => '1',
                'nama' => 'Hutang Usaha',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '2002',
                'akun_id' => '2000',
                'jenis_akun_id' => '1',
                'nama' => 'Hutang Bank',
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '3000',
                'jenis_akun_id' => '3',
                'nama' => 'Modal',     
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '3001',
                'akun_id' => '3000',
                'jenis_akun_id' => '3',
                'nama' => 'Modal Awal',     
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_NERACA
            ],
            [
                'id' => '4000',
                'jenis_akun_id' => '4',
                'nama' => 'Pendapatan',   
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '4001',
                'akun_id' => '4000',
                'jenis_akun_id' => '4',
                'nama' => 'Penjualan',     
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '4002',
                'akun_id' => '4000',
                'jenis_akun_id' => '4',
                'nama' => 'Jasa',     
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '4003',
                'akun_id' => '4000',
                'jenis_akun_id' => '4',
                'nama' => 'Gaji',     
                'saldo_normal' => Akun::SALDO_NORMAL_KREDIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Beban',  
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5001',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Pembelian',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5002',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Jasa',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5003',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Biaya Gedung',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5004',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Biaya Makanan dan Minuman',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5005',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Biaya Pakaian',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5006',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Biaya Transportasi',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5007',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Biaya Hiburan',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
            [
                'id' => '5008',
                'akun_id' => '5000',
                'jenis_akun_id' => '5',
                'nama' => 'Biaya Lain-lain',     
                'saldo_normal' => Akun::SALDO_NORMAL_DEBIT,
                'jenis_laporan' => Akun::JENIS_LAPORAN_LABA_RUGI
            ],
        ];

        foreach ($akun as $data) {
            Akun::create($data);
        }
    }
}
