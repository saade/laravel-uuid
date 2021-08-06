# A small package for adding UUIDs to Eloquent models.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/laravel-uuid.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-uuid)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-uuid/run-tests?label=tests)](https://github.com/ryangjchandler/laravel-uuid/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-uuid/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/laravel-uuid/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/laravel-uuid.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-uuid)

## Installation

You can install the package via composer:

```bash
composer require ryangjchandler/laravel-uuid
```

## Usage

There are 2 methods for applying automatic UUID generation to your models:

### 1. Applying a trait

Add the `RyanChandler\Uuid\Concerns\HasUuid` trait to your model:

```php
class Post extends Model
{
    use \RyanChandler\Uuid\Concerns\HasUuid;
}
```

This will automatically assign a time-ordered UUID to the `uuid` column on your model. UUIDs are generated using the `Str::orderedUuid()` method provided by Laravel.

If you wish to change the column that is used, you can define a `uuidColumn` method on your model:

```php
class Post extends Model
{
    use \RyanChandler\Uuid\Concerns\HasUuid;

    public function uuidColumn(): string
    {
        return 'guid';
    }
}
```

#### `findByUuid` & `findByUuidOrFail`

You can use the `Model::findByUuid` and `Model::findByUuidOrFail` methods to quickly retrieve a model from it's UUID. These behave the same way as `Model::find` and `Model::findOrFail`.

### 2. Mass-registration in `ServiceProvider`

If you want to use the defaults and would like to avoid adding more traits to your model, you can mass-register your models in the `boot` method of a `ServiceProvider`.

```php
use RyanChandler\Uuid\Uuid;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Uuid::generateFor([
            \App\Models\Post::class,
        ]);
    }
}
```

### Using the UUID in route definitions

If you want to use your `uuid` column as the default route-model binding column, you can implement the `RyanChandler\Uuid\Contracts\WithUuidRouteKey` contract on your model.

This will force the `HasUuid` trait to use the `uuid` column as the return value of `getRouteKeyName` which Laravel uses to determine how to receive a model for implicit route-model binding.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
