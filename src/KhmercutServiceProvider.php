<?php

namespace Angkor\Khmercut;

use Illuminate\Process\PendingProcess;
use Illuminate\Support\ServiceProvider;

class KhmercutServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register a class in the service container
        $this->app->bind(Tokenizer::class, function ($app) {
            return new Tokenizer(
                $app->make(PendingProcess::class),
                $app->make('config')->get('tokenizer.binary_path')
            );
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'tokenizer'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'config/config.php' => config_path('tokenizer.php'),
        ], 'config');
    }
}
