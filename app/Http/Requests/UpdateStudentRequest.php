<?php

namespace App\Http\Requests;

use App\Models\Dudi;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "max:255"],
            "nis" => ["required", Rule::notIn(Student::all()->map(fn($student) => $student->nis))],
            "class" => ["required", "max:255"],
            "dudi" => ["required", Rule::in(Dudi::all()->map(fn($dudi) => $dudi->id))],
            "supervisor" => ["required", Rule::in(Supervisor::all()->map(fn($supervisor) => $supervisor->id))]
        ];
    }
}
