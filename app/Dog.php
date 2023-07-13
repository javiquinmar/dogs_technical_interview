<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = ['name', 'breed_id', 'color_id', 'size_id', 'age', 'weight'];

    public function breed(){
        return $this->belongsTo(Breed::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function assignDataFromRequest($request){
        $this->name     = $request->name;
        $this->breed_id = $request->breed_id;
        $this->color_id = $request->color_id;
        $this->size_id  = $request->size_id;
        $this->age      = $request->age;
        $this->weight   = $request->weight;


        if ($request->image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $this->image_path = $imageName;
        }

        return $this;
    }
}
