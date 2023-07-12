<?php

namespace App\Http\Resources;

use App\Breed;
use App\Color;
use App\Size;

class DogResource extends Resource
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toArray()
    {
        $imageUrl = $this->model->image_path
            ? url('images' . DIRECTORY_SEPARATOR . $this->model->image_path)
            : 'https://cdn.iconscout.com/icon/free/png-512/free-dog-2198-1135748.png?f=avif&w=128';
        return [
            'id'     => $this->model->id,
            'name'   => $this->model->name,
            'breed'  => (new BreedResource($this->model->breed))->toArray(),
            'color'  => (new ColorResource($this->model->color))->toArray(),
            'size'   => (new SizeResource($this->model->size))->toArray(),
            'age'    => $this->model->age,
            'weight' => $this->model->weight,
            'image'  => $imageUrl,
        ];
    }
}
