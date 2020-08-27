<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyAnimalRequest extends FormRequest
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

            'name'=> 'required|max:255',
            'description' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'category_id' => 'required',
            'category_id' => 'required',
            'image' => 'required',




            
        ];
    }
}
