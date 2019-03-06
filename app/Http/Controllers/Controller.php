<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
<<<<<<< HEAD
=======
// use App\Http\Controllers\Admin\Cates;

>>>>>>> 354196929f76f1e9df9ac59256e58bd7d9bb90f9
use App\Models\Cates;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

<<<<<<< HEAD
    public function cates_data(){
    	$cates_data = Cates::where('pid',0)->get();
=======
    public function cates_data()
    {
        $cates_data = Cates::where('pid',0)->get();
>>>>>>> 354196929f76f1e9df9ac59256e58bd7d9bb90f9
        foreach($cates_data as $key => $value){
            $value['sub'] = Cates::where('pid',$value->id)->get();
            foreach($value['sub'] as $key2 => $value2){
                $value2['sub'] = Cates::where('pid',$value2->id)->get();
            }
        }
        return $cates_data;
    }
}

