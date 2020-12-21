<?php

namespace App\Providers;

use App\Console\Commands\ModelMakeCommand;
use App\Models\Admin\Department;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        /*
         * Register Console ModelMakeCommand
         * This Console Change Default Model path
         */
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

//        View::composer('layouts.front_app', function ($view){
//            $view -> with('departments', Department::all());
//        });
    }
}
