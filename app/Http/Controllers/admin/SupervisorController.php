<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;
use App\Models\Supervisor;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorController extends Controller
{
    public function index(): View
    {
        $supervisors = Supervisor::all();
        return view('admin.supervisor', compact('supervisors'));
    }

    public function create(CreateSupervisorRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = new User();
            $user->role_id = User::$SUPERVISOR;
            $user->username = $data['nip'];
            $user->password = bcrypt($data['nip']);
            $user->name = $data['name'];
            $user->save();

            $supervisor = new Supervisor();
            $supervisor->name = $data['name'];
            $supervisor->NIP = $data['nip'];
            $user->supervisor()->save($supervisor);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                "failed" => "Gagal menambahkan data"
            ]);
        }

        return redirect()->back()->with([
            'success' => "Sukses manambahkan data"
        ]);
    }

    public function update(UpdateSupervisorRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $requestNIP = Supervisor::query()->where('NIP', $request['nip'])->first();
        $supervisor = Supervisor::query()->find($data['id']);

        if ($requestNIP && $supervisor->NIP !== $requestNIP->NIP) {
            return redirect()->back()->withErrors(["error" => "NIP sudah ada"]);
        }

        try {
            DB::beginTransaction();

            $supervisor->name = $data['name'];
            $supervisor->user->name = $data['name'];
            $supervisor->NIP = $data['nip'];
            $supervisor->save();
            $supervisor->user->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(["error" => "Gagal mengubah pembimbing"]);
        }

        return redirect()->back()->with(['success' => "Sukses mengubah data"]);
    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            $supervisor = Supervisor::query()->find($request->get('id'));
            $supervisor->delete();
            $supervisor->user->delete();
            return redirect()->back()->with(['success' => "Sukses menghapus data"]);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors(["failed" => "Gagal mengubah pembimbing"]);
        }
    }
}
