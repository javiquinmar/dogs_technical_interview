<?php

namespace App\Http\Controllers;

use App\Color;
use App\Http\Resources\ColorResource;
use App\Http\Resources\Resource;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Resource::collection(Color::orderBy('name')->get(), ColorResource::class);
        return response()->json($colors);
    }
}
