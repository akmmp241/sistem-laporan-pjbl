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
        try {
            $this->studentCreateOrUpdate($request);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back()->with([
            'success' => 'Sukses menambahkan siswa'
        ]);
    }

    public function update(UpdateStudentRequest $request): RedirectResponse
    {
        try {
            $this->studentCreateOrUpdate($request);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back()->with([
            'success' => 'Sukses mengubah data'
        ]);
    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            $student = Student::query()->find($request->get('id'));
            $student->delete();
            $student->user->delete();
            return redirect()->back()->with('success', 'Sukses menghapus data');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors('Gagal menghapus data');
        }
    }

    public function studentCreateOrUpdate(CreateStudentRequest|UpdateStudentRequest $request): ?RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = new User();
            $student = new Student();
            if ($request instanceof UpdateStudentRequest) {
                $user = User::query()->find($data['id']);
                $student = Student::query()->find($user->student->id);
            }
            $user->role_id = User::$STUDENT;
            $user->name = $data['name'];
            $user->username = $data['nis'];
            $user->password = bcrypt($data['nis']);
            $user->save();

            $student->supervisor_id = $data['supervisor'];
            $student->dudi_id = $data['dudi'];
            $student->nis = $data['nis'];
            $student->name = $data['name'];
            $student->class = $data['class'];
            $student->save();

            DB::commit();
            return null;
        } catch (Exception $exception) {
            DB::rollBack();

            Log::warning($exception->getMessage());

            $message = match ($request::class) {
                CreateStudentRequest::class => "Gagal menambahkan data",
                UpdateStudentRequest::class => "Gagal mengubah data"
            };

            $request->session()->put(['failed' => $message]);
            throw $exception;
        }
    }
}
