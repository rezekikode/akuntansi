<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class BukuBesar extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
    const DELETED_AT = 'dihapus_pada';

    protected $table = 'buku_besar';

    public function scopeTahun($query, $tahun)
    {
        return $query->whereYear('tanggal', $tahun);
    }

    public function scopeSebelumTahun($query, $tahun)
    {
        return $query->where('tanggal', '<', $tahun.'-01-01');
    }

    public function scopeBulan($query, $bulan)
    {
        return $query->whereMonth('tanggal', $bulan);
    }

    public function scopeSebelumBulan($query, $tahun, $bulan)
    {
        return $query->where('tanggal', '<', $tahun.'-'.$bulan.'-01');
    }

    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }    

    public function scopeSebelumTanggal($query, $tahun, $bulan, $tanggal)
    {
        return $query->where('tanggal', '<', $tahun.'-'.$bulan.'-'.$tanggal);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class);
    }

    public function jurnalDetail()
    {
        return $this->belongsTo(JurnalDetail::class);
    }

    public function totalDebit()
    {
        return $this->attributes['total_debit'] = $this->where('akun_id', $this->akun_id)
            ->where('tanggal', $this->tanggal)
            ->sum('debit');
    }

    public function totalDebitSebelum()
    {
        return $this->attributes['total_debit_sebelum'] = $this->where('akun_id', $this->akun_id)
            ->where('id', '>', $this->id)
            ->sum('debit');
    }

    public function totalKredit()
    {
        return $this->attributes['total_kredit'] = $this->where('akun_id', $this->akun_id)
            ->where('tanggal', $this->tanggal)
            ->sum('kredit');
    }    

    public function totalKreditSebelum()
    {
        return $this->attributes['total_kredit_sebelum'] = $this->where('akun_id', $this->akun_id)
            ->where('id', '>', $this->id)
            ->sum('kredit');
    }

    public function saldoDebit()
    {
        $saldo = 0;

        if ($this->akun->saldo_normal == Akun::SALDO_NORMAL_DEBIT) {
            $saldo = $this->totalDebit() - $this->totalKredit();
            $saldo += $this->totalDebitSebelum() - $this->totalKreditSebelum();
        }

        return $this->attributes['saldo'] = $saldo;
    }

    public function saldoKredit()
    {
        $saldo = 0;

        if ($this->akun->saldo_normal == Akun::SALDO_NORMAL_KREDIT) {
            $saldo = $this->totalKredit() - $this->totalDebit();
            $saldo += $this->totalKreditSebelum() - $this->totalDebitSebelum();
        }

        return $this->attributes['saldo'] = $saldo;
    }
}
