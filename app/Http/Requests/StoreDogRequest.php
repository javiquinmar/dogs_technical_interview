<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'breed_id' => ['required', 'exists:breeds,id'],
            'color_id' => ['required', 'exists:colors,id'],
            'size_id'  => ['required', 'exists:sizes,id'],
            'age'      => ['integer', 'min:0', 'max:30', 'nullable'],
            'weight'   => ['integer', 'min:0', 'max:100', 'nullable'],
            'image'    => ['image', 'mimes:jpeg,png,jpg', 'max:4096', 'nullable'],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string'   => 'El nombre debe ser una cadena',
            'name.min' => 'El nombre debe contener al menos 3 caracteres',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'breed_id.required' => 'La raza es obligatoria',
            'breed_id.integer' => 'La raza debe ser un número',
            'breed_id.exists' => 'La raza seleccionada no existe',
            'color_id.required' => 'El color es obligatorio',
            'color_id.integer' => 'El color debe ser un número',
            'color_id.exists' => 'El color seleccionado no existe',
            'size_id.required' => 'El tamaño es obligatorio',
            'size_id.integer' => 'El tamaño debe ser un número',
            'size_id.exists' => 'El tamaño seleccionado no existe',
            'age.integer' => 'La edad debe ser un número',
            'age.min' => 'La edad no puede ser menor a 0',
            'age.max' => 'La edad no puede ser mayor a 30',
            'weight.integer' => 'El peso debe ser un número',
            'weight.min' => 'El peso no puede ser menor a 0',
            'weight.max' => 'El peso no puede ser mayor a 100',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'El archivo debe ser una imagen con formato jpeg, png o jpg',
            'image.max' => 'El archivo no puede ser mayor a 4MB',
        ];
    }
}
