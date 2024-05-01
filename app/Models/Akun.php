<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Akun extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
    const DELETED_AT = 'dihapus_pada';

    const AKUN_ASET = 1000;
    const AKUN_KEWAJIBAN = 2000;
    const AKUN_MODAL = 3000;
    const AKUN_PENDAPATAN = 4000;
    const AKUN_BEBAN = 5000;

    const SALDO_NORMAL_DEBIT = 'Debit';
    const SALDO_NORMAL_KREDIT = 'Kredit';

    const JENIS_LAPORAN_LABA_RUGI = 'Laba Rugi';
    const JENIS_LAPORAN_NERACA = 'Neraca';

    protected $table = 'akun';

    public $incrementing = false;

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function akunAnak()
    {
        return $this->hasMany(Akun::class);
    }

    public function jenisAkun()
    {
        return $this->belongsTo(JenisAkun::class);
    }

    public function AkunBukuBesar()
    {
        return $this->hasOne(AkunBukuBesar::class, 'id', 'id');
    }

    public function jurnalDetail()
    {
        return $this->hasMany(JurnalDetail::class);
    }

    public function bukuBesar()
    {
        return $this->hasMany(BukuBesar::class);
    }
}
