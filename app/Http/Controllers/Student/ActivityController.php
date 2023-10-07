<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Models\Report;
use App\Models\Student;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->url() === route('student.checkin') ? "masuk" : "keluar";

        return view('student.activity', ["type" => $type]);
    }

    public function submit(CreateStudentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('images');
        $data['dudi_id'] = $data['dudi'];
        $data['student_id'] = Student::query()->where('user_id', Auth::user()->id)->first()->id;
        $data['date'] = $data['date'] . ' ' . now()->format('H:i:s');
        $type = $request->url() === route('student.checkin') ? "masuk" : "keluar";


        try {
            DB::beginTransaction();

            $task = Task::query()->create($data);

            $report = [
                'task_id' => $task->id,
                'type' => $type,
            ];

            Report::query()->create($report);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect(route('student.home'))->with([
                "message" => $exception->getMessage()
            ]);
        }


        return redirect(route('student.home'))->with([
            "message" => "suskses menambah laporan"
        ]);
    }
}
