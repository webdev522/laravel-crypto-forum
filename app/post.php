<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table="posts";
    protected $primaryKey="id";
    protected $guarded=[];

    public function thread(){
        return $this->belongsTo(thread::class, 'id','thread_id');
    }
    public function tweets($slug){
        return $this->belongsTo(thread::class, 'id','thread_id')->where('slug',$slug);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
