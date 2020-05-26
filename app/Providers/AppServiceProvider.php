<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\Auth;


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


        View::composer('*',function($view){
            if (Auth::user() != null) {
                $view->with('auth',Auth::user());
                $userID = \Auth::user()->id;
                $StudentLink =  '75' . $userID .'1T';
                View::share('StudentLink',$StudentLink);
            }
        });

    }
}
