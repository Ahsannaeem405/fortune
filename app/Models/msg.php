<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msg extends Model
{
    // use HasFactory;
    public function getuser(){

        return $this->belongsTo('App\Models\User', 'from');
    }
    public function getuser2(){

        return $this->belongsTo('App\Models\Fortune', 'to');
    }
}
