<?php

namespace App\Http\Controllers;

use App\Size;
use App\Http\Resources\SizeResource;
use App\Http\Resources\Resource;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Resource::collection(Size::orderBy('name')->get(), SizeResource::class);
        return response()->json($sizes);
    }
}
