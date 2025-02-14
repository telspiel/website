<?php

namespace App\Providers;

use App\Models\CareerContact;
use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $noti= CareerContact::orderBy('id','desc')->get();
        view()->share('notifications', $noti);
    }
}
