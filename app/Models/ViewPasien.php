<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPasien extends Model
{
    use HasFactory;
    protected $table = 'view_pasien';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
