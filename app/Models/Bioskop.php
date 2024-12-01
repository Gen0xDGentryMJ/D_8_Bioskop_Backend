<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;
    protected $table ="bioskops";
    protected $primarykey ="id";
    protected $fillable = [
        'lokasi',
        'nama_bioskop',
        'jumlah_studio',
        'kapasitas_studio',
    ];
}
