<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewStokOrder extends Model
{
    use HasFactory;
    protected $table = 'view_stok_order';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
