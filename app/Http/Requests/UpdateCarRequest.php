<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brand' => 'sometimes|min:2',
            'model'=> 'sometimes|min:2',
            'year'=> 'sometimes|before:' . now(),
            'max_speed'=> 'integer|between:20,300',
            'is_automatic'=> 'sometimes',
            'engine'=> 'sometimes',
            'number_of_doors'=> 'sometimes|integer|between:2,5',
        ];
    }
}
