<?php

namespace phuongna\onesk;

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\ServiceProvider as OriginServiceProvider;
use phuongna\onesk\Services\SSOAuthGuard;

class ServiceProvider extends OriginServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/onesk.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('onesk.php'),
        ], 'config');
        $this->extendProvider();
        $this->extendAuthGuard();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'onesk'
        );

        $this->app->bind('onesk', function () {
            return new onesk();
        });
    }

    /**
     *
     */
    protected function extendProvider()
    {
        Auth::provider('sso', function($app) {
            return new OneSKAuthServiceProvider($app);
        });
    }
    /**
     * Extend Laravel's Auth.
     *
     * @return void
     */
    protected function extendAuthGuard()
    {
        Auth::extend('sso-jwt', function ($app, $name, array $config) {
            $guard = new SSOAuthGuard(
                $app['tymon.jwt'],
                $app['auth']->createUserProvider($config['provider']),
                $app['request']
            );
            $app->refresh('request', $guard, 'setRequest');
            return $guard;
        });
    }
}
