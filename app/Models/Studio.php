<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    protected $table ="studios";
    protected $primarykey ="id";
    protected $fillable = [
        'id_bioskop',
        'kapasitas_studio',
        'jenis_tayangan',
    ];
}
