<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table ="movies";
    protected $primarykey ="id";
    protected $fillable = [
        'judul',
        'deskripsi',
        'genre',
        'poster',
        'durasi',
    ];
}
