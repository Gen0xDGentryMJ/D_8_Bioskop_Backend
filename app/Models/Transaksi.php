<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table ="transaksis";
    protected $primarykey ="id";
    protected $fillable = [
        'total_pembayaran',
        'metode_pembayaran',
        'status_transaksi',
    ];
}
