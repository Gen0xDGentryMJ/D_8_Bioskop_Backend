<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $table ="shows";
    protected $primarykey ="id";
    protected $fillable = [
        'show_date',
        'id_bioskop',
        'id_movie',
        'id_studio',
        'harga',
        'sisa_kursi',
    ];
}
