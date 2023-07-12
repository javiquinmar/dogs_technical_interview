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
            'name'     => ['string', 'max:255', 'required'],
            'breed_id' => ['integer', 'required', 'exists:breeds,id'],
            'color_id' => ['integer', 'required', 'exists:colors,id'],
            'size_id'  => ['integer', 'required', 'exists:sizes,id'],
            'age'      => ['integer', 'min:0', 'max:30', 'nullable'],
            'weight'   => ['integer', 'min:0', 'max:100', 'nullable'],
            'image'    => ['image', 'mimes:jpeg,png,jpg', 'max:4096', 'nullable'],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string'   => 'El nombre debe ser una cadena',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'breed_id.required' => 'La raza es obligatoria',
            'breed_id.integer' => 'La raza debe ser un número',
            'breed_id.exists' => 'La raza no existe',
            'color_id.required' => 'El color es obligatorio',
            'color_id.integer' => 'El color debe ser un número',
            'color_id.exists' => 'El color no existe',
            'size_id.required' => 'El tamaño es obligatorio',
            'size_id.integer' => 'El tamaño debe ser un número',
            'size_id.exists' => 'El tamaño no existe',
            'age.integer' => 'La edad debe ser un número',
            'age.min' => 'La edad no puede ser menor a 0',
            'age.max' => 'La edad no puede ser mayor a 30',
            'weight.integer' => 'El peso debe ser un número',
            'weight.min' => 'El peso no puede ser menor a 0',
            'weight.max' => 'El peso no puede ser mayor a 100',
        ];
    }
}
