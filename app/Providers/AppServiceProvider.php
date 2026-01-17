<?php

namespace App\Providers;

use App\Http\Controllers\PageController;
use App\Models\Admin;
use App\Models\Lokasi;
use App\Models\Service;
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
        ['template', 'temppage', 'admin.tempdash'],
            function ($view) {
                $view->with([
                    'userGlobal' => Service::select('email', 'nomor_hp')->first(),
                    'locationGlobal' => Lokasi::select('nama_lokasi')->first(),
                    'adminGlobal' => Admin::select('name', 'email')->first()
                ]);
            }
        );
    }
}
