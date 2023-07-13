<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiodataMahasiswa extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = ['id_mahasiswa'];
    // protected $table = 'biodata_mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = false;

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id_mahasiswa', 'like', '%' . $search . '%')
            ->orWhere('nama_mahasiswa', 'like', '%' . $search . '%')
            ->orWhere('tempat_lahir', 'like', '%' . $search . '%');
    }
}
