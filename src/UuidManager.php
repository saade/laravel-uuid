<?php

namespace RyanChandler\Uuid;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class UuidManager
{
    public function generateFor(string|array $model)
    {
        if (is_array($model)) {
            foreach ($model as $class) {
                $this->generateFor($class);
            }

            return;
        }

        $model::creating(function (Model $model) {
            $model->uuid = $this->generateUuid();
        });
    }

    public function generateUuid(): string
    {
        return (string) Str::orderedUuid();
    }
}
