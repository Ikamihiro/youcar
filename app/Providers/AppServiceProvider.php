<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Pagina;
use App\CarouselImage;

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
        Schema::defaultStringLength(191);
        View::composer('*', function($view)
        {
            $view->with('paginas', Pagina::all());
            $view->with('imagens', CarouselImage::all());
            $view->with('anos', [
                '1990','1991','1992','1993','1994','1995','1996','1997','1998','1999',
                '2000','2001','2002','2003','2004','2005','2006','2007','2008','2009',
                '2010','2011','2012','2013','2014','2015','2016','2017','2018','2019',
                '2020','2021','2022','2023','2024','2025','2026','2027','2028','2029', 
                '2030'
            ]);
        });
    }
}
