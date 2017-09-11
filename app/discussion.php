<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discussion extends Model
{
    //
    protected $table = 'discussions';
    public $timestamps = false;
    public function threads(){
        return $this->belongsTo(thread::class,'f_thread_id','id');
    }
}
