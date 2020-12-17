<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //registra qualquer serviço na nossa aplicação
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //inicializa qualquer serviço da nossa aplicação
        //irão inicializar as configurações necessarias para o uso do SDK
        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Gamesow")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Gamesow")->setRelease("1.0.0");
        Paginator::useBootstrap();

    }
}
