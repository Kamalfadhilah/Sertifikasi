<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'pendaftaran';
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_lengkap',
        'alamat_KTP',
        'alamat_lengkap',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'nomor_telepon',
        'nomor_hp',
        'email',
        'kewarganegaraan',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'status_menikah',
        'agama',
        'dokument',
        'status',
    ];
}
