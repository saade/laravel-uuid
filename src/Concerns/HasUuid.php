<?php

namespace RyanChandler\Uuid\Concerns;

use Illuminate\Database\Eloquent\Model;
use RyanChandler\Uuid\Uuid;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $column = $model->uuidColumn();

            $model->{$column} = Uuid::generateUuid();
        });
    }

    public function uuidColumn(): string
    {
        return 'uuid';
    }
}
