<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewStok extends Model
{
    use HasFactory;
    protected $table = 'view_stok';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
