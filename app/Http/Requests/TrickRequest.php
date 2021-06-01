<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrickRequest extends FormRequest
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
        $rules = [

            'date'          => 'required|date',
            'title'         => 'required|string|max: 255',
            'photo.*'       => 'mimes:jpeg,jpg,png,gif,webp|max:1000|nullable',
            'content'       => 'required|string',
            'local_price'   => 'required|numeric',
            'foreign_price' => 'required|numeric',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [

                'display' => 'mimes:jpeg,jpg,png,gif,webp|max:1000|required',
                'file'    => 'mimes:jpeg,jpg,png,gif,webp,pdf,doc,docx|max:5000|required',

            ];
        } else {

            return $rules + [

                'display' => 'mimes:jpeg,jpg,png,gif,webp|max:1000|nullable',
                'file'    => 'mimes:jpeg,jpg,png,gif,webp,pdf,doc,docx|max:5000|nullable',

            ];
        }
    }
}
