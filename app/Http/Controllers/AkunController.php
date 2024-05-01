<?php

namespace App\Http\Controllers;

use App\Http\Requests\AkunStoreRequest;
use App\Http\Requests\AkunUpdateRequest;
use App\Models\Akun;
use App\Models\JenisAkun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $induk = Akun::find($request->get('induk'));
        if ($induk) {
            $akuns = Akun::withTrashed()
                ->where('akun_id', $induk->id)
                ->orderBy('id')
                ->get();            
        } else {
            $akuns = Akun::withTrashed()
                ->whereNull('akun_id')
                ->orderBy('id')
                ->get();
        }            
        return view('akun.index', compact('induk', 'akuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $induk = Akun::find($request->get('induk'));
        if ($induk) {
            $akunInduk = Akun::where('id', $induk)->get();
        } else {
            $akunInduk = Akun::all();
        }   
        $jenisAkun = JenisAkun::all();
        
        return view('akun.create', compact('induk', 'akunInduk', 'jenisAkun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AkunStoreRequest $request): RedirectResponse
    {
        $induk = Akun::find($request->get('induk'));

        $akun = new Akun();
        $akun->id = $request->id;
        $akun->akun_id = $request->akun_id;
        $akun->jenis_akun_id = $request->jenis_akun_id;
        $akun->nama = $request->nama;
        $akun->saldo_normal = $request->saldo_normal;
        $akun->jenis_laporan = $request->jenis_laporan;
        $akun->save();

        return redirect()
            ->route('akun.index', ['induk' => $induk])
            ->with('success', __('messages.create.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Akun $akun): View
    {
        $induk = $request->get('induk');
        $akunInduk = Akun::all();
        $jenisAkun = JenisAkun::all();
        return view('akun.show', compact('akun', 'induk', 'akunInduk', 'jenisAkun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Akun $akun): View
    {
        $this->authorize('update', $akun);

        $induk = $request->get('induk');
        $akunInduk = Akun::all();
        $jenisAkun = JenisAkun::all();
        return view('akun.edit', compact('akun', 'induk', 'akunInduk', 'jenisAkun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AkunUpdateRequest $request, Akun $akun): RedirectResponse
    {
        $this->authorize('update', $akun);

        $induk = Akun::find($request->get('induk'));

        $akun->id = $request->id;
        $akun->akun_id = $request->akun_id;
        $akun->jenis_akun_id = $request->jenis_akun_id;
        $akun->nama = $request->nama;
        $akun->saldo_normal = $request->saldo_normal;
        $akun->jenis_laporan = $request->jenis_laporan;
        $akun->save();  

        return redirect()
            ->route('akun.index', ['induk' => $induk])
            ->with('success', __('messages.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Akun $akun): RedirectResponse
    {
        $this->authorize('delete', $akun);

        $induk = Akun::find($request->get('induk'));

        $akun->delete();

        return redirect()
            ->route('akun.index', ['induk' => $induk])
            ->with('success', __('messages.destroy.success'));
    }

    public function restoreAjax(
        $id
    )
    {
        Akun::withTrashed()->where('id', $id)->restore();     

        return redirect()
            ->route('akun.index')
            ->with('success', 'messages.restore.success');
    }
}
