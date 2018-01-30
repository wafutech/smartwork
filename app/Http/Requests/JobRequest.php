<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'expected_duration_id'         => 'required|exists:expected_durations,id',
          'complexity_id'      => 'required|numeric',
         'job_desc'      => 'required|string',
         'main_skill_id'      => 'required',
        'payment_amount'      => 'required|numeric',
         'job_category_id'      => 'required',  
        'job_attachment'      => 'file|mimes:doc,pdf,rtf,docx',      
         'time_commitment'      => 'required',      
         'expected_duration_id'      => 'required',      
         'experience_level'      => 'required',      
         'payment_type'      => 'required',
          'freelancers_needed'      => 'required|numeric',
          'project_phase'      => 'required',    
        'job_type'      => 'required',      
          'job_type'      => 'required',  
          'currency_id'      => 'required', 
        ];
    }
}
