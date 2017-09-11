<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class thread extends Model
{
    protected $table="threads";
    protected $primaryKey="id";
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function like(){
        return $this->hasMany(like::class,'thread_id','id');
    }
    public function like_user(){
        return $this->hasMany(like::class,'thread_id','id')->where('user_id',Auth::user()->id);
    }
}
