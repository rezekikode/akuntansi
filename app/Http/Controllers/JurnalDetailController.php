<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurnalDetailStoreRequest;
use App\Http\Requests\JurnalDetailUpdateRequest;
use App\Models\JurnalDetail;
use Illuminate\Http\Request;

class JurnalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('jurnal-detail.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('jurnal-detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JurnalDetailStoreRequest $request)
    {
        $jurnalDetail = new JurnalDetail();
        $jurnalDetail->jurnal_id = $request->jurnal_id;
        $jurnalDetail->akun_id = $request->akun_id;
        $jurnalDetail->debit = $request->debit;
        $jurnalDetail->kredit = $request->kredit;
        $jurnalDetail->save();

        return redirect()->route('jurnal.edit', $jurnalDetail->jurnal_id)->with('success', 'Jurnal Detail berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JurnalDetail $jurnalDetail)
    {
        //return view('jurnal-detail.show', compact('jurnalDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JurnalDetail $jurnalDetail)
    {
        //return view('jurnal-detail.edit', compact('jurnalDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JurnalDetailUpdateRequest $request, JurnalDetail $jurnalDetail)
    {
        $jurnalDetail->jurnal_id = $request->jurnal_id;
        $jurnalDetail->akun_id = $request->akun_id;
        $jurnalDetail->debit = $request->debit;
        $jurnalDetail->kredit = $request->kredit;
        $jurnalDetail->save();

        return redirect()->route('jurnal.edit', $jurnalDetail->jurnal_id)->with('success', 'Jurnal Detail berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JurnalDetail $jurnalDetail)
    {
        $jurnalId = $jurnalDetail->jurnal_id;

        $jurnalDetail->delete();

        return redirect()->route('jurnal.edit', $jurnalId)->with('success', 'Jurnal Detail berhasil dihapus');
    }
}
