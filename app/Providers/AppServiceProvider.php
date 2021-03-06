<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Collection::macro('recursive',function(){
            return $this->map(function($value){
                if(is_array($value) || is_object($value))
                {
                    return collect($value)->recursive();
                }
                return $value;
            });

        });
        Paginator::useTailwind();
    }
}
