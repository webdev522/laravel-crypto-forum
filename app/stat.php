<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stat extends Model
{
    //
    protected $table="stats";
    public function coins(){
        return $this->belongsTo(coin::class,'id','fk_coins');
    }
}
