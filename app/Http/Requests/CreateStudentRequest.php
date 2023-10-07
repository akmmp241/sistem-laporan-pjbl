<?php

namespace App\Http\Requests;

use App\Models\Dudi;
use App\Models\Supervisor;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateStudentRequest extends FormRequest
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
            "name" => ["required", "max:255"],
            "nis" => ["required", "numeric"],
            "class" => ["required", "max:255"],
            "dudi" => ["required", Rule::in(Dudi::all()->map(fn($dudi) => $dudi->id))],
            "supervisor" => ["required", Rule::in(Supervisor::all()->map(fn($supervisor) => $supervisor->id))]
        ];
    }

    public function messages(): array
    {
        return [
            'nis.numeric' => 'NIS harus berupa angka'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->withErrors($validator->getMessageBag());
    }
}
