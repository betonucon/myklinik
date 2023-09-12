<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewUser extends Model
{
    use HasFactory;
    protected $table = 'view_user';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
