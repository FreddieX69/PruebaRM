<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Foundation\Http\FormRequest;


class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $date = date('Y-m-d', strtotime('-18 years')); 
        return [
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_nacimiento' => 'required|date|before_or_equal:'.$date,
            'salario' => 'required|numeric',
            'rol_id' => 'required'
        ] +($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store()
    {
        return [
            'email' => 'required|unique:usuarios|email',
            'num_dpi' => 'required|numeric|unique:usuarios',
            'foto' => 'bail|required|mimes:jpg,png|dimensions:width=600,height=400'
        ];
    }

    public function update()
    {
        return [
            'email' => 'required|email',
            'num_dpi' => 'required|numeric',
            'foto' => 'bail|mimes:jpg,png|dimensions:width=600,height=400',
        ];
    }

    public function messages()
    {
        return [
            'primer_nombre.required' => 'El primer nombre es obligatorio',
            'segundo_nombre.required' => 'El segundo nombre es obligatorio',
            'primer_apellido.required' => 'El primer apellido es obligatorio',
            'segundo_apellido.required' => 'El segundo apellido es obligatorio',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'fecha_nacimiento.before_or_equal' => 'El usuario registrado no es mayor de 18 años',
            'salario.required' => 'El salario es obligatorio',
            'salario.numeric' => 'El salario debe ser de tipo numerico',
            'email.unique' => 'El correo ingresado ya está registrado',
            'email.required' => 'El correo es obligatrorio',
            'email.email' => 'Correo incorrecto',
            'num_dpi.required' =>'El numero de DPI es obligatorio',
            'num_dpi.numeric' =>'El numero de DPI debe ser un numero',
            'num_dpi.unique' =>'El numero de DPI ya esta registrado',
            'rol_id.required' => 'El rol es obligatorio',          
            'foto.required'=>'La fotografia es obligatoria',
            'foto.mimes'=>'La foto debe estar en formato jpg o png',
            'foto.dimensions'=>'La fotografia deber ser de 600x400 pixeles',
            'foto.uploaded'=>'La foto es demasiado grande',
        ];
    }
}
