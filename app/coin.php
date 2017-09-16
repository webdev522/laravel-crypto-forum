<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coin extends Model
{
    protected $table = 'coins';
    public $timestamps = false;
    public function stats(){
        return $this->hasMany(stat::class,'fk_coins','id');
    }
}
