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
            $dog->name     = $request->name;
            $dog->breed_id = $request->breed_id;
            $dog->color_id = $request->color_id;
            $dog->size_id  = $request->size_id;
            $dog->age      =  $request->age;
            $dog->weight   =  $request->weight;


            if ($request->image) {
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $dog->image_path = $imageName;
            }

            $dog->save();

            return $this->sendResponse((new DogResource($dog))->toArray(), 'Perro creado correctamente.');
        } catch(Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function update(StoreDogRequest $request, $id)
    {
        try {
            Dog::find($id)->update($request->all());
            return $this->sendResponse(null, 'Perro actualizado correctamente.');
        } catch(Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        //
    }
}
