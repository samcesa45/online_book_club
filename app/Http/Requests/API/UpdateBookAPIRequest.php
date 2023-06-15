<?php

namespace App\Http\Requests\API;
use App\Http\Requests\AppBaseFormRequest;
use App\Models\Book;


class UpdateBookAPIRequest extends AppBaseFormRequest
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
            'title' => 'required|string|max:191',
            'author'=> 'required|string|max:191',
            'description'=> 'required|string|max:255',
            'cover_image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'cover_image_path'=> 'required|mimes:pdf,doc,docs,xls',
        ];
    }
}
