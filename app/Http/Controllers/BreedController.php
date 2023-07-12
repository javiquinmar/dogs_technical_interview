<?php

namespace App\Http\Controllers;

use App\Breed;
use App\Http\Resources\BreedResource;
use App\Http\Resources\Resource;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function index()
    {
        $breeds = Resource::collection(Breed::orderBy('name')->get(), BreedResource::class);
        return response()->json($breeds);
    }
}
