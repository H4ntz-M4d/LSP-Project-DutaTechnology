<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'bulan';

    // Specify the primary key
    protected $primaryKey = 'id';

    // Set whether the primary key is auto-incrementing
    public $incrementing = true;

    // Specify if the model should use timestamps
    public $timestamps = false; // Assuming you don't have created_at and updated_at columns

    // Define the fillable fields
    protected $fillable = ['bulan'];

    // Define the relationship with the KalenderKegiatan model
    public function kalenderKegiatan()
    {
        return $this->hasMany(KalenderKegiatan::class, 'id_bulan');
    }
}
