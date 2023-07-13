<?php

namespace App\Http\Controllers;

use App\Dog;
use App\Http\Requests\StoreDogRequest;
use App\Http\Resources\DogResource;
use App\Http\Resources\Resource;
use Illuminate\Http\Request;

class DogController extends BaseApiController
{
    public function index()
    {
        $dogs = Resource::collection(Dog::with(['breed', 'color', 'size'])->orderBy('id', 'desc')->get(), DogResource::class);
        return $this->sendResponse($dogs);
    }

    public function store(StoreDogRequest $request)
    {
        try {
            $dog = new Dog;
            $dog->assignDataFromRequest($request);
            $dog->save();

            return $this->sendResponse((new DogResource($dog))->toArray(), 'Perro creado correctamente.');
        } catch(Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function update(StoreDogRequest $request, $id)
    {
        try {
            $dog = Dog::find($id);
            $dog->assignDataFromRequest($request);
            $dog->update();

            return $this->sendResponse($dog, 'Perro actualizado correctamente.');
        } catch(Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $dog = Dog::destroy($id);
            return $this->sendResponse($dog, 'Perro eliminado correctamente.');
        } catch(Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
