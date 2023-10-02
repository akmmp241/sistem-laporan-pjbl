<?php

namespace App\Http\Requests;

use App\Models\Dudi;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AddTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'detail' => ['required'],
            'date' => ['required', 'date'],
            'dudi' => ['required', Rule::in(Dudi::all()->map(function ($item) { return $item->id; }))],
            'image' => ['required', 'file', 'mimes:jpg,png']
        ];
    }

    public function messages()
    {
        return [
            "*.required" => ":attribut tidak boleh kosong",
            'mimes' => "ekstensi harus berupa JPG atau PNG",
            'size' => "ukuran file tidak bisa lebih dari 1MB"
        ];
    }
}
