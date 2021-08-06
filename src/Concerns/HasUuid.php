<?php

namespace RyanChandler\Uuid\Concerns;

use Illuminate\Database\Eloquent\Model;
use RyanChandler\Uuid\Contracts\WithUuidRouteKey;
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

    public static function findByUuid(string $uuid)
    {
        $self = new static();

        return static::where($self->uuidColumn(), $uuid)->first();
    }

    public static function findByUuidOrFail(string $uuid)
    {
        $self = new static();

        return static::where($self->uuidColumn(), $uuid)->firstOrFail();
    }

    public function getRouteKeyName()
    {
        if ($this instanceof WithUuidRouteKey) {
            return $this->uuidColumn();
        }

        return parent::getRouteKeyName();
    }

    public function uuidColumn(): string
    {
        return 'uuid';
    }
}
