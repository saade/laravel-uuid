<?php

namespace RyanChandler\Uuid;

use Ryangjchandler\Uuid\Commands\UuidCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UuidServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-uuid');
    }
}
