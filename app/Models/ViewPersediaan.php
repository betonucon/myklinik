<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPersediaan extends Model
{
    use HasFactory;
    protected $table = 'view_persediaan';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
