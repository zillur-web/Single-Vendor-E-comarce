<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminSkils extends Model
{
    use HasFactory, SoftDeletes;
    function admin_skils(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
