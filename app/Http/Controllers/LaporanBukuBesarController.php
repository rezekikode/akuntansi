<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\AkunBukuBesar;
use App\Models\BukuBesar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LaporanBukuBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $akunBukuBesar = AkunBukuBesar::has('bukuBesar')
            ->orderBy('id')
            ->get();
        return view('laporan.buku-besar.index', compact('akunBukuBesar'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Akun $akun)
    {        
        $induk = $request->query('induk');
        
        $bukuBesars = BukuBesar::where('akun_id', $akun->id)
            ->tahun(Session::get('year'))
            ->bulan(Session::get('month'));

        $bukuBesars = BukuBesar::where('akun_id', $akun->id)
            ->sebelumBulan(Session::get('year'), Session::get('month'))
            ->union($bukuBesars)
            ->orderBy('tanggal')
            ->get(); 

        return view('laporan.buku-besar.show', compact('induk', 'akun', 'bukuBesars'));
    }
}
