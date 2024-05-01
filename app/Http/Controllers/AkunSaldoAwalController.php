<?php

namespace App\Http\Controllers;

use App\Http\Requests\AkunSaldoAwalStoreRequest;
use App\Http\Requests\AkunSaldoAwalUpdateRequest;
use App\Models\Akun;
use App\Models\AkunSaldoAwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AkunSaldoAwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Akun $akun)
    {
        $akunSaldoAwals = AkunSaldoAwal::where('akun_id', $akun->id)
            ->tahun(Session::get('year'))
            ->bulan(Session::get('month'))
            ->get();

        return view('akun.saldo-awal-akun.index', compact('akun', 'akunSaldoAwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Akun $akun)
    {
        $induk = Akun::find($request->get('induk'));

        return view('akun.saldo-awal-akun.create', compact('induk', 'akun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AkunSaldoAwalStoreRequest $request, Akun $akun)
    {
        $induk = Akun::find($request->get('induk'));

        $akunSaldoAwal = AkunSaldoAwal::where('akun_id', $request->akun_id)
            ->tanggal($request->tanggal)
            ->first();

        if (!$akunSaldoAwal) {
            $akunSaldoAwal = new AkunSaldoAwal();
        }

        $akunSaldoAwal->akun_id = $request->akun_id;
        $akunSaldoAwal->tanggal = $request->tanggal;
        $akunSaldoAwal->debit = $request->debit;
        $akunSaldoAwal->kredit = $request->kredit;
        $akunSaldoAwal->save();

        return redirect()->route('akun.saldo-awal-akun.index', [$akun, 'induk' => $induk])
            ->with('success', __('messages.create.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AkunSaldoAwal $akunSaldoAwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AkunSaldoAwal $akunSaldoAwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AkunSaldoAwalUpdateRequest $request, AkunSaldoAwal $akunSaldoAwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AkunSaldoAwal $akunSaldoAwal)
    {
        //
    }
}
