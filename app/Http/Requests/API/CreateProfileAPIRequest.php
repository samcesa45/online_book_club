<?php

namespace App\Http\Requests\API;
use App\Http\Requests\AppBaseFormRequest;
use App\Models\User;


class CreateProfileAPIRequest extends AppBaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {  
       
        return [
          'first_name' => 'required|string|max:191',
          'last_name'=> 'required|string|max:191',
          'middle_name' => 'required|string|max:191',
          'job_title' => 'required|string|max:191',
          'profile_picture_path' => 'required|mimes:jpg,png,jpeg,gif,svg',
          'date_of_birth' => 'required|date',
          'username' => 'required|string|max:191',
          'email' => 'required|email',
          'telephone'=>'required|digits_between:0,11'
        ];
    }
}
