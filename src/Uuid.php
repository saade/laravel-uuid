<?php

namespace Saade\Uuid;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string generateUuid()
 * @method static void generateFor(string|array $model)
 *
 * @see \Saade\Uuid\UuidManager
 */
class Uuid extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UuidManager::class;
    }
}
