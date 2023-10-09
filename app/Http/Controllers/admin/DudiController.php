<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDudiRequest;
use App\Http\Requests\UpdateDudiRequest;
use App\Models\Dudi;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DudiController extends Controller
{
    public function index(): View
    {
        $dudis = Dudi::all();
        return view('admin.dudi', compact('dudis'));
    }

    public function create(CreateDudiRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $dudi = new Dudi();
            $dudi->name = $data['name'];
            $dudi->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(["error" => "Gagal menambahkan data"]);
        }

        return redirect()->back()->with(["success" => "Sukses menambahkan data"]);
    }

    public function update(UpdateDudiRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $dudi = Dudi::query()->find($data['id']);
            $dudi->name = $data['name'];
            $dudi->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(["failed" => "Gagal mmengubah data"]);
        }

        return redirect()->back()->with(["success" => "Sukses mengubah data"]);
    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            $dudi = Dudi::query()->find($request->get('id'));
            if ($dudi->students()->count() !== 0) {
                throw new Exception('DUDI yang masih terdapat siswa tidak dapat dihapus');
            }
            $dudi->delete();
            return redirect()->back()->with(["success" => "Sukses menghapus data"]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(["failed" => $e->getMessage()]);
        }
    }
}
