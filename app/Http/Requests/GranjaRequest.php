<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GranjaRequest extends Request
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
        return [                          
            'nombre'=>'required',//  |unique:granja',                   
            'zona'=>'required',//  |unique:granja',                   
            'id_empresa'=>'required',//  |unique:granja',                   
        ];
    }
}
