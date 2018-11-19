<?php

declare(strict_types=1);

/*
 * This file is part of Omaussa Telegram.
 */

namespace Omaussa\Telegram;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * This is the Telegram service provider class.
 *
 * @author Orlando Maussa <https://github.com/omaussa>
 */
class TelegramServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath($raw = __DIR__.'/../config/telegram.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('telegram.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('telegram');
        }

        $this->mergeConfigFrom($source, 'telegram');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            //
        ];
    }
}
