<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // SQL LOG
        DB::listen(function($query) {
          $sql = $query->sql;
          for ($i = 0; $i < count($query->bindings); $i++) {
            $sql = preg_replace("/\?/", $query->bindings[$i], $sql, 1);
          }

          Log::debug("SQL", ["time" => sprintf("%.2f ms", $query->time), "sql" => $sql]);
        });
    }
}
