<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class AkunBukuBesar extends Model
{
    protected $table = 'akun';

    public $incrementing = false;

    public function akunAnak()
    {
        return $this->hasMany(AkunBukuBesar::class, 'akun_id', 'id');
    }

    public function jenisAkun()
    {
        return $this->belongsTo(JenisAkun::class, 'jenis_akun_id', 'id');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'jurnal_id', 'id');
    }

    public function saldoAwalSekarang()
    {
        return $this->hasOne(AkunSaldoAwal::class, 'akun_id', 'id')
            ->tahun(Session::get('year'))
            ->bulan(Session::get('month'))
            ->orderBy('id', 'desc');
    }

    public function saldoAwalSebelum()
    {
        return $this->hasOne(AkunSaldoAwal::class, 'akun_id', 'id')
            ->sebelumBulan(Session::get('year'), Session::get('month'))
            ->orderBy('id', 'desc');
    }

    public function totalSaldoAwal()
    {
        $total = 0;
        $debit = 0;
        $kredit = 0;

        if ($this->saldoawalsekarang) {
            $debit = $this->saldoawalsekarang->debit;
        } else if ($this->saldoawalsebelum) {
            $debit = $this->saldoawalsebelum->debit;
        }

        if ($this->saldoawalsekarang) {
            $kredit = $this->saldoawalsekarang->kredit;
        } else if ($this->saldoawalsebelum) {
            $kredit = $this->saldoawalsebelum->kredit;
        }

        if ($this->saldo_normal == Akun::SALDO_NORMAL_DEBIT) {
            $total = $debit - $kredit;
        }

        if ($this->saldo_normal == Akun::SALDO_NORMAL_KREDIT) {
            $total = $kredit - $debit;
        }

        return $this->attributes['total_saldo_awal'] = $total;
    }

    public function totalSaldoAwalAnak()
    {
        $total = $this->totalSaldoAwal();

        foreach ($this->akunAnak as $akunAnak) {
            $total += $akunAnak->totalSaldoAwal();
        }

        return $this->attributes['total_saldo_awal_anak'] = $total;
    }

    public function bukuBesar()
    {
        return $this->hasMany(BukuBesar::class, 'akun_id', 'id');
    }

    public function totalDebit()
    {
        $total1 = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->tahun(Session::get('year'));
                $query->bulan(Session::get('month'));
            })
            ->sum('debit');

        $total2 = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->sebelumBulan(Session::get('year'), Session::get('month'));
            })
            ->sum('debit');       

        return $this->attributes['total_debit'] = $total1 + $total2;
    }

    public function totalDebitSekarang()
    {
        return $this->attributes['total_debit_sekarang'] = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->tahun(Session::get('year'));
                $query->bulan(Session::get('month'));
            })
            ->sum('debit');
    }

    public function totalDebitSebelum()
    {
        return $this->attributes['total_debit_sebelum'] = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->sebelumBulan(Session::get('year'), Session::get('month'));
            })        
            ->sum('debit');
    }

    public function totalKredit()
    {
        $total1 = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->tahun(Session::get('year'));
                $query->bulan(Session::get('month'));
            })
            ->sum('kredit');

        $total2 = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->sebelumBulan(Session::get('year'), Session::get('month'));
            })
            ->sum('kredit');

        return $this->attributes['total_kredit'] = $total1 + $total2;
    }   
    
    public function totalKreditSekarang()
    {
        return $this->attributes['total_kredit_sekarang'] = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->tahun(Session::get('year'));
                $query->bulan(Session::get('month'));
            })
            ->sum('kredit');
    }   

    public function totalKreditSebelum()
    {
        return $this->attributes['total_kredit_sebelum'] = $this->bukuBesar()
            ->whereHas('jurnal', function ($query) {
                $query->sebelumBulan(Session::get('year'), Session::get('month'));
            })        
            ->sum('kredit');
    }

    public function totalDebitAnak()
    {
        $totalDebit = $this->totalDebit();

        foreach ($this->akunAnak as $akunAnak) {
            $totalDebit += $akunAnak->totalDebitAnak();
        }

        return $this->attributes['total_debit_anak'] = $totalDebit;
    }

    public function totalDebitAnakSekarang()
    {
        $totalDebit = $this->totalDebitSekarang();

        foreach ($this->akunAnak as $akunAnak) {
            $totalDebit += $akunAnak->totalDebitAnakSekarang();
        }

        return $this->attributes['total_debit_anak_sekarang'] = $totalDebit;
    }

    public function totalDebitAnakSebelum()
    {
        $totalDebit = $this->totalDebitSebelum();

        foreach ($this->akunAnak as $akunAnak) {
            $totalDebit += $akunAnak->totalDebitAnakSebelum();
        }

        return $this->attributes['total_debit_anak_sebelum'] = $totalDebit;
    }

    public function totalKreditAnak()
    {
        $totalKredit = $this->totalKredit();

        foreach ($this->akunAnak as $akunAnak) {
            $totalKredit += $akunAnak->totalKreditAnak();
        }

        return $this->attributes['total_kredit_anak'] = $totalKredit;
    }

    public function totalKreditAnakSekarang()
    {
        $totalKredit = $this->totalKreditSekarang();

        foreach ($this->akunAnak as $akunAnak) {
            $totalKredit += $akunAnak->totalKreditAnakSekarang();
        }

        return $this->attributes['total_kredit_anak_sekarang'] = $totalKredit;
    }

    public function totalKreditAnakSebelum()
    {
        $totalKredit = $this->totalKreditSebelum();

        foreach ($this->akunAnak as $akunAnak) {
            $totalKredit += $akunAnak->totalKreditAnakSebelum();
        }

        return $this->attributes['total_kredit_anak_sebelum'] = $totalKredit;
    }

    public function saldoDebit()
    {
        $saldo = 0;

        if ($this->saldo_normal == Akun::SALDO_NORMAL_DEBIT) {
            $saldo = $this->totalDebitAnak() - $this->totalKreditAnak();
        }

        $saldo += $this->totalSaldoAwalAnak();

        return $this->attributes['saldo_debit'] = $saldo;
    }

    public function saldoDebitSebelum()
    {
        $saldo = 0;

        if ($this->saldo_normal == Akun::SALDO_NORMAL_DEBIT) {
            $saldo = $this->totalDebitAnakSebelum() - $this->totalKreditAnakSebelum();
        }

        $saldo += $this->totalSaldoAwalAnak();

        return $this->attributes['saldo_debit_sebelum'] = $saldo;
    }

    public function saldoKredit()
    {
        $saldo = 0;

        if ($this->saldo_normal == Akun::SALDO_NORMAL_KREDIT) {
            $saldo = $this->totalKreditAnak() - $this->totalDebitAnak();
        }

        $saldo += $this->totalSaldoAwalAnak();

        return $this->attributes['saldo_kredit'] = $saldo;
    }

    public function saldoKreditSebelum()
    {
        $saldo = 0;

        if ($this->saldo_normal == Akun::SALDO_NORMAL_KREDIT) {
            $saldo = $this->totalKreditAnakSebelum() - $this->totalDebitAnakSebelum();
        }

        $saldo += $this->totalSaldoAwalAnak();

        return $this->attributes['saldo_kredit_sebelum'] = $saldo;
    }

    public function saldo()
    {
        $total = 0;

        if ($this->saldo_normal == Akun::SALDO_NORMAL_DEBIT) {
            $total = $this->totalDebitAnak() - $this->totalKreditAnak();
        }

        if ($this->saldo_normal == Akun::SALDO_NORMAL_KREDIT) {
            $total = $this->totalKreditAnak() - $this->totalDebitAnak();
        }

        $total += $this->totalSaldoAwalAnak();

        return $this->attributes['saldo'] = $total;
    }

    public function saldoSebelum()
    {
        $total = 0;

        if ($this->saldo_normal == Akun::SALDO_NORMAL_DEBIT) {
            $total = $this->totalDebitAnakSebelum() - $this->totalKreditAnakSebelum();
        }
        if ($this->saldo_normal == Akun::SALDO_NORMAL_KREDIT) {
            $total = $this->totalKreditAnakSebelum() - $this->totalDebitAnakSebelum();
        }

        $total += $this->totalSaldoAwalAnak();
        
        return $this->attributes['saldo_sebelum'] = $total;
    }
}
