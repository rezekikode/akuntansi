<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurnal extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
    const DELETED_AT = 'dihapus_pada';

    const STATUS_SUDAH_POSTING = 'Sudah Posting';
    const STATUS_BELUM_POSTING = 'Belum Posting';

    protected $table = 'jurnal';

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

    public function scopeBelumPosting($query)
    {
        return $query->where('status', self::STATUS_BELUM_POSTING);
    }

    public function scopeSudahPosting($query)
    {
        return $query->where('status', self::STATUS_SUDAH_POSTING);
    }

    public function jenisJurnal()
    {
        return $this->belongsTo(JenisJurnal::class);
    }

    public function jurnalDetail()
    {
        return $this->hasMany(JurnalDetail::class);
    }

    public function totalDebit()
    {
        return $this->jurnalDetail()->sum('debit');
    }

    public function totalKredit()
    {
        return $this->jurnalDetail()->sum('kredit');
    }
}
