<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
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
            'award_title'      => 'required|string',  
           'award_desc' =>'required|string',
           //'award_link' =>'url',
           'date_awarded' =>'date',
        'organization' =>'required|string',
        'award_attachment' =>'required|image|mimes:jpeg,jpg,gif,png,pdf',

        ];
    }
}
