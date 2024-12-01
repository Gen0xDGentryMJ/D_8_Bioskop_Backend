<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;
    protected $table ="kursis";
    protected $primarykey ="id";
    protected $fillable = [
        'baris_kursi',
        'nomor_kursi',
    ];
}
