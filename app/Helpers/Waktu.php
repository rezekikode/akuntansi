<?php

namespace App\Helpers;

use Carbon\Carbon;

class Waktu
{
    public static function daftarBulan($bahasa = 'id')
    {
        $bulan = [];

        // Looping dari bulan 1 sampai 12
        for ($i = 1; $i <= 12; $i++) {
            // Menambahkan nama bulan dalam bahasa yang dipilih ke dalam array
            $data = [
                'id' => $i,
                'nama' => Carbon::create(null, $i, null, null, null, null)->locale($bahasa)->monthName
            ];
            array_push($bulan, (object) $data);
        }

        return $bulan;
    }

    public static function daftarTahun($awal, $akhir)
    {
        $tahun = [];

        // Looping dari tahun awal sampai akhir
        for ($i = $awal; $i <=  $akhir; $i++) {
            // Menambahkan nama tahun ke dalam array
            $data = [
                'id' => $i,
                'nama' => $i
            ];
            array_push($tahun, (object) $data);
        }

        return $tahun;
    }

    public static function tahunSekarang()
    {
        return Carbon::now()->year;
    }

    public static function bulanSekarang()
    {
        return Carbon::now()->month;
    }

    public static function bulanSekarangBahasa($bahasa)
    {
        return Carbon::now()->locale($bahasa)->isoFormat('MMMM');
    }   

    public static function tanggalSekarang()
    {
        return Carbon::now()->format('Y-m-d');
    }

    public static function tanggalSekarangBahasa($bahasa)
    {
        return Carbon::now()->locale($bahasa)->isoFormat('dddd, D MMMM Y');
    }

    public static function hariSekarangBahasa($bahasa)
    {
        return Carbon::now()->locale($bahasa)->isoFormat('dddd');
    }

    public static function namaTanggal($tanggal, $bahasa = 'id')
    {
        $tahun = Carbon::parse($tanggal)->locale($bahasa)->year;
        //$bulan = Carbon::parse($tanggal)->locale($bahasa)->month;
        $hari = Carbon::parse($tanggal)->locale($bahasa)->day;
        $namaBulan = Carbon::parse($tanggal)->locale($bahasa)->monthName;
        $namaHari = Carbon::parse($tanggal)->locale($bahasa)->dayName;
        return $namaHari . ', ' . $hari . ' ' . $namaBulan . ' ' . $tahun;
    }

    public static function namaHari($hari, $bahasa = 'id')
    {
        return Carbon::create(null, null, $hari, null, null, null)->locale($bahasa)->dayName;
    }

    public static function namaBulan($bulan, $bahasa = 'id')
    {
        return Carbon::create(null, $bulan, null, null, null, null)->locale($bahasa)->monthName;
    }
}