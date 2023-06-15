<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\AppBaseFormRequest;

class UpdateProfileRequest extends AppBaseFormRequest
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
            'profile_picture_path' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'date_of_birth' => 'required|date',
            'username' => 'required|string|max:191',
            'email' => 'required|email',
           
          ];
    }
}
