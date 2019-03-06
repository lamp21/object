<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use App\Http\Controllers\Admin\Cates;

use App\Models\Cates;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cates_data()
    {
        $cates_data = Cates::where('pid',0)->get();
        foreach($cates_data as $key => $value){
            $value['sub'] = Cates::where('pid',$value->id)->get();
            foreach($value['sub'] as $key2 => $value2){
                $value2['sub'] = Cates::where('pid',$value2->id)->get();
            }
        }
        return $cates_data;
    }
}

