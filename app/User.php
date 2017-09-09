<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=['id', 'remember_token', 'created_at', 'updated_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function threads(){
//        dd($this->hasMany(thread::class, 'user_id','id'));
        return $this->hasMany(thread::class, 'user_id','id');
    }

    public function posts(){
        return $this->hasMany(post::class, 'id','thread_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id','id')
                    ->orderBy('updated_at','desc')
                    ->offset(0)
                    ->limit(4);
    }
	
	public function following(){
	 
        return $this->hasMany(favourite::class, 'f_user_id','id');
												  
							   
							   
    }
}
