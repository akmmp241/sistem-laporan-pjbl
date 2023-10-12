<?php

namespace App\Http\Requests;

use App\Models\Dudi;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateTaskRequest extends FormRequest
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
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:1024']
        ];
    }

    public function messages(): array
    {
        return [
            "*.required" => ":attribute kegiatan tidak boleh kosong",
            "image.mimes" => "Ekstensi harus berupa JPG atau PNG",
            "image" => "Ukuran file tidak bisa lebih dari 1MB",
            "dudi" => "Pilih dudi dengan sesuai"
        ];
    }
}
