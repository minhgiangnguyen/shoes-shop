<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\genders;
use App\Models\colors;
use App\Models\sizes;
use App\Models\collections;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../Http/helpers.php';

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        view()->composer('layout.main', function($view) {
            $view->with(['genders' =>genders::select(['GenderID', 'GenderName'])->get() ]);
        });
        view()->composer('shop.category', function($view) {
            $view->with(['colors' =>colors::select(['ColorID', 'ColorName'])
                                    ->withCount('products')
                                    ->get(),
                        'sizes' =>sizes::select(['SizeID', 'SizeName'])
                                    ->withCount('products')
                                    ->get(),
                        'collections' =>collections::select(['CollectionID', 'CollectionName'])
                                        ->withCount('products')
                                        ->get() ,
                        'genders' =>genders::select(['GenderID', 'GenderName'])
                                        ->withCount('products')
                                        ->get() 
                                        
                        ]);
        });
    }
}