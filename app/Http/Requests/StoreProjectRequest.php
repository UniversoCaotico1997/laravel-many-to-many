<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects')->ignore($this->project), 'min:5', 'max:100'],
            'cover_image' => 'nullable|image|max:900',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',
            'description' => 'nullable|max:255'
        ];
    }
}
