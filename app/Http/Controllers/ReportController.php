<?php

namespace App\Http\Controllers;

use App\Http\Resources\LogCollection;
use App\Http\Resources\ReportCollection;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(): View
    {
        $logs = Report::query()->where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('log', [
            'logs' => $logs
        ]);
    }
}
