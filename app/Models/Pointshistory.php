<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointshistory extends Model
{
    public function getname(){

        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
