<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home_Users extends Model
{
    public $table = 'home_users';
    //一对一
    public function usersinfo()
    {
    	return $this->hasOne('App\Models\Usersinfo','id');
    }
}
