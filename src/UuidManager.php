<?php

namespace RyanChandler\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UuidManager
{
    public function generateFor(string | array $model)
    {
        if (is_array($model)) {
            foreach ($model as $class) {
                $this->generateFor($class);
            }

            return;
        }

        $model::creating(function (Model $model) {
            $column = method_exists($model, 'uuidColumn')
                ? $model->uuidColumn()
                : 'uuid';

            $model->{$column} = $this->generateUuid();
        });
    }

    public function generateUuid(): string
    {
        return (string) Str::orderedUuid();
    }
}
