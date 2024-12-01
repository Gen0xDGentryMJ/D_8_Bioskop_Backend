<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryUser extends Model
{
    use HasFactory;
    protected $table ="history_users";
    protected $primarykey ="id";
    protected $fillable = [
        'id_user',
        'id_show',
        'id_tiket',
        'id_transaksi',
        'id_review',
    ];
}
