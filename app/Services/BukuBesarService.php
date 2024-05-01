<?php

namespace App\Services;

use App\Models\BukuBesar;
use App\Models\Jurnal;
use App\Models\JurnalDetail;

class BukuBesarService
{
    protected $jurnal;

    public function __construct()
    {
        $this->jurnal = new Jurnal;
    }

    public function tutupPosting($id)
    {
        $jurnal = $this->jurnal->findOrFail($id);
        $jurnal->status = Jurnal::STATUS_SUDAH_POSTING;
        $jurnal->save();

        $jurnalDetail = JurnalDetail::where('jurnal_id', $id)->get();
        
        foreach ($jurnalDetail as $data) {
            $bukuBesar = BukuBesar::where('jurnal_id', $data->jurnal_id)
                ->where('jurnal_detail_id', $data->id)
                ->first();
            if ($bukuBesar) {
                $bukuBesar->tanggal = $data->jurnal->tanggal;
                $bukuBesar->jurnal_id = $data->jurnal_id;
                $bukuBesar->jurnal_detail_id = $data->id;
                $bukuBesar->akun_id = $data->akun_id;
                $bukuBesar->debit = $data->debit;
                $bukuBesar->kredit = $data->kredit;
                $bukuBesar->save();
            } else {
                $bukuBesar = new BukuBesar();
                $bukuBesar->tanggal = $data->jurnal->tanggal;
                $bukuBesar->jurnal_id = $data->jurnal_id;
                $bukuBesar->jurnal_detail_id = $data->id;
                $bukuBesar->akun_id = $data->akun_id;
                $bukuBesar->debit = $data->debit;
                $bukuBesar->kredit = $data->kredit;
                $bukuBesar->save();
            }            
        }
    }

    public function bukaPosting($id)
    {
        $jurnal = $this->jurnal->findOrFail($id);
        $jurnal->status = Jurnal::STATUS_BELUM_POSTING;
        $jurnal->save();
    }
}