<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

=======
use View;
use App\Http\Controllers\Home\IndexController;
>>>>>>> remotes/origin/changgao
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        //
=======
        // 共享 数据
        View::share('common_cates_data',IndexController::getPidCates());
>>>>>>> remotes/origin/changgao
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
