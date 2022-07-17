<?php

namespace RickWest\Wordpress;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WordpressServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-wordpress-api')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->app->singleton(Wordpress::class, fn () => new Wordpress());

        if (config('wordpress-api.sportspress.enabled')) {
            $this->app->singleton(SportsPress::class, fn () => new SportsPress());
        }
    }
}
