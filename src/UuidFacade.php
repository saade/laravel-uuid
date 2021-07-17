<?php

namespace Ryangjchandler\Uuid;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ryangjchandler\Uuid\Uuid
 */
class UuidFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-uuid';
    }
}
