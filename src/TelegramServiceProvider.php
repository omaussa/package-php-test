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
        $this->publishes([
            __DIR__.'/config/telegram.php' => config_path('telegram.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/telegram.php', 'telegram'
        );
    }

}
