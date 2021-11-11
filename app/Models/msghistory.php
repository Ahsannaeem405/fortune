<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msghistory extends Model
{
    use HasFactory;
    public function msg_list(){

        return $this->hasOne('App\Models\msg','id','msg_id');
    }
    public function getuser(){

        return $this->belongsTo('App\Models\User', 'manager_id');
    }

}
