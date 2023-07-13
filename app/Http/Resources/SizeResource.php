<?php

namespace App\Http\Resources;

class SizeResource
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toArray()
    {
        return [
            'id'     => $this->model->id,
            'name'   => $this->model->name,
            'order'  => $this->model->order,
        ];
    }
}
