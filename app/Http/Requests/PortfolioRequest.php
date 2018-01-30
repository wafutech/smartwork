<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'portfolio_image'      => 'required|image|mimes:jpeg,gif,png,jpg,doc.docx.pdf,ppt,pup',  
           'portfolio_desc' =>'required|string',
           'portfolio_link' =>'url',
           'title' =>'string',
           

                    ];
    }
}
