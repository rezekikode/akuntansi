<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AkunSaldoAwal extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
    const DELETED_AT = 'dihapus_pada';

    protected $table = 'akun_saldo_awal';

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

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
}
