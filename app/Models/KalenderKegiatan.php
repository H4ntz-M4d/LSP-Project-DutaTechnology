<?php

namespace App\Models;

use App\Models\Bulan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KalenderKegiatan extends Model
{
    // Specify the table name if it doesn't follow the convention
    protected $table = 'kalender_kegiatan';

    // Specify the primary key if it's not an incrementing integer
    protected $primaryKey = 'id';

    // Set whether the primary key is auto-incrementing
    public $incrementing = true;

    // Specify if the model should use timestamps
    public $timestamps = false; // Assuming you don't have created_at and updated_at columns

    // Define the fillable fields (mass assignment protection)
    protected $fillable = ['kegiatan', 'minggu', 'id_bulan'];

    // Define the relationship with the Month model
    public function bulan()
    {
        return $this->belongsTo(Bulan::class, 'id_bulan');
    }
}
