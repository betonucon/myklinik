<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewKepala extends Model
{
    use HasFactory;
    protected $table = 'view_kepala';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
