<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $guarded=[];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
