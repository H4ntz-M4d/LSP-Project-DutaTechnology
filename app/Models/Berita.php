<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'berita';

    // Kunci utama tabel
    protected $primaryKey = 'id';

    // Menentukan apakah model menggunakan timestamp
    public $timestamps = true;

    // Atribut yang bisa diisi massal
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];

    // Atribut yang harus dipastikan dalam format timestamp
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Mengatur format timestamp
    protected $dateFormat = 'Y-m-d H:i:s';
}
