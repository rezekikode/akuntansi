<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JurnalBelumPosting;
use App\Http\Requests\JurnalStoreRequest;
use App\Http\Requests\JurnalUpdateRequest;
use App\Models\Akun;
use App\Models\JenisJurnal;
use App\Models\Jurnal;
use App\Services\BukuBesarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurnalController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(JurnalBelumPosting::class)
            ->only([
                'edit', 
                'update', 
                'destroy', 
                'posting'
            ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnals = Jurnal::withTrashed()
            ->tahun(Session::get('year'))
            ->bulan(Session::get('month'))
            ->get();
        //$jurnal = Jurnal::with('jenisJurnal')->belumPosting()->get();
        //$jurnal = Jurnal::with('jenisJurnal')->sudahPosting()->get();
        return view('jurnal.index', compact('jurnals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisJurnal = JenisJurnal::all();
        return view('jurnal.create', compact('jenisJurnal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JurnalStoreRequest $request)
    {
        $jurnal = new Jurnal();
        $jurnal->jenis_jurnal_id = $request['jenis_jurnal_id'];
        $jurnal->tanggal = $request['tanggal'];
        $jurnal->keterangan = $request['keterangan'];
        $jurnal->status = $request['status'];
        $jurnal->save();

        return redirect()->route('jurnal.edit', $jurnal->id)->with('success', 'Jurnal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Jurnal $jurnal)
    {
        $this->authorize('show', $jurnal);

        $idDetail = $request->query('idDetail');
        $jurnalDetail = $jurnal->jurnalDetail()
            ->where('id', $idDetail)
            ->first();
        $jenisJurnal = JenisJurnal::all();
        $akun = Akun::all();
        return view('jurnal.show', compact('jurnal', 'jurnalDetail', 'jenisJurnal', 'akun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Jurnal $jurnal)
    {
        $this->authorize('update', $jurnal);

        $idDetail = $request->query('idDetail');
        $jurnalDetail = $jurnal->jurnalDetail()
            ->where('id', $idDetail)
            ->first();
        $jenisJurnal = JenisJurnal::all();
        $akun = Akun::all();
        return view('jurnal.edit', compact('jurnal', 'jurnalDetail', 'jenisJurnal', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        JurnalUpdateRequest $request, 
        BukuBesarService $bukuBesarService, 
        Jurnal $jurnal
    )
    {
        $this->authorize('update', $jurnal);

        $jurnal->jenis_jurnal_id = $request['jenis_jurnal_id'];
        $jurnal->tanggal = $request['tanggal'];
        $jurnal->keterangan = $request['keterangan'];
        $jurnal->save();

        if ($request->status == Jurnal::STATUS_SUDAH_POSTING) {

            $this->authorize('posting', $jurnal);

            $bukuBesarService->tutupPosting($jurnal->id);
        }

        return redirect()->route('jurnal.edit', $jurnal->id)->with('success', 'Jurnal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
        $this->authorize('delete', $jurnal);

        foreach ($jurnal->jurnalDetail as $jurnalDetail) {
            $jurnalDetail->bukuBesar()->delete();
            $jurnalDetail->delete();
        }
        $jurnal->delete();

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil dihapus');
    }

    /**
     * Posting the specified resource from storage.
     */
    public function postingAjax(
        BukuBesarService $bukuBesarService, 
        $id
    )
    {        
        $jurnal = Jurnal::find($id);

        $this->authorize('posting', $jurnal);

        if ($jurnal) {
            $jurnal->status = Jurnal::STATUS_SUDAH_POSTING;
            $jurnal->save();

            if ($jurnal->status == Jurnal::STATUS_SUDAH_POSTING) {
                $bukuBesarService->tutupPosting($jurnal->id);
            }
        }        

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil diposting');
    }

    public function restoreAjax(
        $id
    )
    {
        Jurnal::withTrashed()->where('id', $id)->restore();     

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil dikembalikan');
    }
}
