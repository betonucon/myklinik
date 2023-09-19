<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewTransaksi extends Model
{
    use HasFactory;
    protected $table = 'view_transaksi';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
