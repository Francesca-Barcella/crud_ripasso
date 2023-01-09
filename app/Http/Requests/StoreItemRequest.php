<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'name' => 'required|min:10|max:50',
            'image' => 'nullable|max:255',
            'description' => 'nullable|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve essere di minimo :min caratteri',
            'name.max' => 'Il nome deve essere di massimo :max caratteri',
            'image.max' => 'l\'immagine può contenere massimo max: caratteri',
            'description.max' => 'la descrizione può contenere massimo max: caratteri',
        ];
    }
}
