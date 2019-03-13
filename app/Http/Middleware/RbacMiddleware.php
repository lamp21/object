<?php

namespace App\Http\Middleware;

use Closure;

class RbacMiddleware
{   
    public static function getControllerAndFunction(){
        $action = \Route::current()->getActionName();
        list($class,$method) = explode('@',$action);
        $class = substr(strrchr($class,'\\'),1);
        return ['controller'=>$class,'method'=>$method];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        // 获取 当前用户 的 权限
        $admin_node_type = session('admin_node_type');
        // 用户可以访问的控制器
        $keys = array_keys($admin_node_type);

        $cname_aname = self::getControllerAndFunction();
        $cname = strtolower($cname_aname['controller']);
        $aname = strtolower($cname_aname['method']);

        // 检查 用户权限
        if(!in_array($cname,$keys)){
            return redirect('404');
        }

        if(!in_array($aname,$admin_node_type[$cname])){
            return redirect('404');
        }
        return $next($request);
    }
}
