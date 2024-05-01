<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JurnalDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
    const DELETED_AT = 'dihapus_pada';

    protected $table = 'jurnal_detail';

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function bukuBesar()
    {
        return $this->hasOne(BukuBesar::class);
    }
}
