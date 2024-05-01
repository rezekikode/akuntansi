<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisJurnal extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diubah_pada';
    const DELETED_AT = 'dihapus_pada';

    protected $table = 'jenis_jurnal';

    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }
}
