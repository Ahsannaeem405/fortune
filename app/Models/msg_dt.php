<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msg_dt extends Model
{
    use HasFactory;
    public function msg_par(){

        return $this->belongsTo('App\Models\msg','msg_id','id');
    }
}
