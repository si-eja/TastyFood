<?php

namespace App\Providers;

use App\Http\Controllers\PageController;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer(
        ['template', 'temppage'],
            function ($view) {
                $view->with([
                    'userGlobal' => User::select('email', 'nomor_hp')->first(),
                    'locationGlobal' => Lokasi::select('nama_lokasi')->first()
                ]);
            }
        );
    }
}
