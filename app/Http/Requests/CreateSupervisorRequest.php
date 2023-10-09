<?php

namespace App\Http\Requests;

use App\Models\Supervisor;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateSupervisorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "max:255"],
            "nip" => ["required", Rule::notIn(Supervisor::all()->map(fn($supervisor) => $supervisor->NIP))]
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "nama tidak boleh kosong",
            "nip.required" => "NIP (username) tidak boleh kosong",
            "nip.not_in" => "NIP sudah ada",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->withErrors($validator->getMessageBag());
    }
}
