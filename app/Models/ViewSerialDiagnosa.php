<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewSerialDiagnosa extends Model
{
    use HasFactory;
    protected $table = 'view_serial_diagnosa';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
