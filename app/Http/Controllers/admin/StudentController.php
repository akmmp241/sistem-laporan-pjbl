<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Dudi;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $students = Student::all();
        $dudis = Dudi::all();
        $supervisors = Supervisor::all();
        return view('admin.student', compact('students', 'dudis', 'supervisors'));
    }

    public function create(CreateStudentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = new User();
            $user->role_id = User::$STUDENT;
            $user->username = $data['nis'];
            $user->password = bcrypt($data['nis']);
            $user->name = $data['name'];
            $user->save();

            $student = new Student();
            $student->user_id = $user->id;
            $student->supervisor_id = $data['supervisor'];
            $student->dudi_id = $data['dudi'];
            $student->nis = $data['nis'];
            $student->name = $data['name'];
            $student->class = $data['class'];
            $student->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['failed' => 'Gagal menambahkan data']);
        }

        return redirect()->back()->with([
            'success' => 'Sukses menambahkan siswa'
        ]);
    }

    public function update(UpdateStudentRequest $request)
    {
        $request->validated();
    }
}
