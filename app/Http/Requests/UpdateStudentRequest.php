<?php

namespace App\Http\Requests;

use App\Models\Dudi;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            "id" => ["required"],
            "name" => ["required", "max:255"],
            "nis" => ["required", "numeric", Rule::notIn(Student::all()->map(function ($student) {
                if ($student->nis !== $this['nis']) {
                    return $student->nis;
                }
            }))],
            "class" => ["required", "max:255"],
            "dudi" => ["required", Rule::in(Dudi::all()->map(function ($dudi) {
                if ($dudi->id !== $this['dudi']) {
                    return $dudi->id;
                }
            } ))],
            "supervisor" => ["required", Rule::in(Supervisor::all()->map(function ($supervisor) {
                if ($supervisor->id !== $this['supervisor']) {
                    return $supervisor->id;
                }
            }))]
        ];
    }

    public function messages(): array
    {
        return [
            "nis.numeric" => "NIS harus berupa angka",
            "nis.notIn" => "NIS sudah ada"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->withErrors($validator->getMessageBag());
    }
}
