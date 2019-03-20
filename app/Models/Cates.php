<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{	
    public $table = 'cates';


	public function article(){

		return $this->hasOne('App\Models\Article','cate_uid');
	}   	
    
}
