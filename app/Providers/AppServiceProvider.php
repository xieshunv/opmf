<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        //调试模式 将Sql输出的log
        if (env('APP_DEBUG')) {
            DB::listen(function ($query) {
                $sql = str_replace('?', '"' . '%s' . '"', $query->sql);
                $sql = vsprintf($sql, $query->bindings);
                $sql = str_replace("\\", "", $sql);
                Log::info('SQL:' . $sql);
            });
        }
    }
}
