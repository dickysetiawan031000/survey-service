<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'survey_id' => 'required|exists:surveys,id',
            'text' => 'required|string|max:255',
            'type' => 'required|string|in:text,multiple_choice,scale',
            'options' => 'nullable|array',
            'options.*' => 'string|max:255',
        ];
    }
}
