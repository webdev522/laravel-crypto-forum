<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    //
    protected $table="follows";
    public $timestamps = false;


    public function threads()
    {
        return $this->hasMany(thread::class, 'user_id','f_follower_id');
    }
}
