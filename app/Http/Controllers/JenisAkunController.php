<?php

namespace App\Http\Controllers;

use App\Models\JenisAkun;
use Illuminate\Http\Request;

class JenisAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisAkun = JenisAkun::all();
        return view('jenis-akun.index', compact('jenisAkun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        JenisAkun::create($validated);

        return redirect()->route('jenis-akun.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisAkun $jenisAkun)
    {
        return view('jenis-akun.show', compact('jenisAkun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisAkun $jenisAkun)
    {        
        return view('jenis-akun.edit', compact('jenisAkun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisAkun $jenisAkun)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $jenisAkun->update($validated);

        return redirect()->route('jenis-akun.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisAkun $jenisAkun)
    {
        $jenisAkun->delete();

        return redirect()->route('jenis-akun.index');
    }
}
