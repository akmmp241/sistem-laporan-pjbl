<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->url() === route('checkin') ? "masuk" : "keluar";

        return view('activity', ["type" => $type]);
    }


}
