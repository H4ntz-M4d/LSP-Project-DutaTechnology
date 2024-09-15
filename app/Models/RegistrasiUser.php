<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiUser extends Model
{
    use HasFactory;

    protected $table = 'registrasi_user';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'ktp_nik_passport',
        'tempat_lahir',
        'tanggal_lahir',
        'provinsi',
        'kabupaten',
        'alamat_rumah',
        'kode_pos_pribadi',
        'nomor_telepon_pribadi',
        'email_pribadi',
        'pendidikan',
        'lembaga',
        'jabatan',
        'alamat_kantor',
        'kode_pos_kantor',
        'nomor_telepon_kantor',
        'fax',
        'email_kantor'
    ];
}
