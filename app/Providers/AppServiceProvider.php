<?php

namespace CTFlor\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('rtype', function($attribute, $value, $parameters, $validator) {
            return $value != "Choose your option";
        });

        Validator::extend('revent', function($attribute, $value, $parameters, $validator) {
            return $value != "Choose your option";
        });

        Validator::extend('rparticipant', function($attribute, $value, $parameters, $validator) {
            return $value != "Choose your option";
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
