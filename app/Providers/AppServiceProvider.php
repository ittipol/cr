<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\library\service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('page.charity.header', function($view){

            $news = Service::loadModel('News')
            ->select('id','charity_id','title','short_desc','thumbnail','created_at')
            ->where('charity_id','=',request()->id)
            ->count();

            $projects = Service::loadModel('Project')
            ->select('id','name','short_desc','thumbnail','end_date','target_amount')
            ->where([
              ['charity_id','=',request()->id],
              ['end_date','>',date('Y-m-d H:i:s')]
            ])
            ->count();

            $video = Service::loadModel('Video')
            ->select('id','charity_id','title','short_desc','thumbnail','created_at')
            ->where('charity_id','=',request()->id)
            ->count();

            view()->share('_id',request()->id);
            view()->share('_totalProject',$projects);
            view()->share('_totalNews',$news);
            view()->share('_totalVideo',$video);

        });

        view()->composer('page.charity.nav', function($view){

            $news = Service::loadModel('News')
            ->select('id','charity_id','title','short_desc','thumbnail','created_at')
            ->where('charity_id','=',request()->id)
            ->count();

            $projects = Service::loadModel('Project')
            ->select('id','name','short_desc','thumbnail','end_date','target_amount')
            ->where([
              ['charity_id','=',request()->id],
              ['end_date','>',date('Y-m-d H:i:s')]
            ])
            ->count();

            $video = Service::loadModel('Video')
            ->select('id','charity_id','title','short_desc','thumbnail','created_at')
            ->where('charity_id','=',request()->id)
            ->count();

            view()->share('_id',request()->id);
            view()->share('_totalProject',$projects);
            view()->share('_totalNews',$news);
            view()->share('_totalVideo',$video);

        });
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
