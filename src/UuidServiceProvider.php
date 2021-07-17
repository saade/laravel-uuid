<?php

namespace Ryangjchandler\Uuid;

use Ryangjchandler\Uuid\Commands\UuidCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UuidServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-uuid')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-uuid_table')
            ->hasCommand(UuidCommand::class);
    }
}
