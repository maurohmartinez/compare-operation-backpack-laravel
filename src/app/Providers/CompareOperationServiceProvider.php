<?php

namespace MHMartinez\CompareOperation\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class CompareOperationServiceProvider extends ServiceProvider
{
    public function boot(Kernel $kernel): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'compare-operation');
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/compare-operation'),
        ], 'views');
    }
}
