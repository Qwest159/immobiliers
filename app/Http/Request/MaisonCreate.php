<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class MaisonCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //ATTENTION ICIIIIIIIIIIIIIIIIIIII
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
            'title' => 'required|string|max:255',
            'price' => 'required|max:255',
            'address' => 'required|max:25',
            'number_of_rooms' => 'required|max:25',
            'size' => 'required|max:25',
            'description' => 'required|max:25',
            'img_path' => 'required|max:2000',
        ];
    }
}
