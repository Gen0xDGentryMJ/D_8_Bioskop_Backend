<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table ="tickets";
    protected $primarykey ="id";
    protected $fillable = [
        'id_movie',
        'id_user',
        'id_show',
        'id_studio',
        'id_kursi',
        'status'
    ];
}
